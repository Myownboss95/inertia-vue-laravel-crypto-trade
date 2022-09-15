<?php

namespace App\Http\Controllers\User;

use Hash;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Mail\Withdrawal\TokenRequest;
use App\Mail\Withdrawal\TokenRequested;
use App\Models\Settings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class WithdrawalController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()
            ->where('user_id', auth()->user()->id)
            ->where('type', 'withdrawal');

        return inertia('user.withdrawals.index', [
            'deposits' => $query->paginate(),
        ]);
    }

    public function create()
    {
        $payment_methods = PaymentMethod::latest()->where('status', 1)->get();
        return inertia('user.withdrawals.withdraw', [
            'payment_methods' => $payment_methods,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'account' => ['required', 'string', 'in:main,referral'],
            'method_id' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'address' => ['required', 'string'],
        ]);

        $user = User::findOrFail(auth()->user()->id);

        if ($request->input('amount') < 10) {
            return back()->withError('Withdrawal amount cannot be lower than $10');
        }

        $amount = $request->input('amount');
        $userAccount = $user->accounts()->where('type', $request->input('account'))->first();

        if ($amount > $userAccount?->account) {
            session()->flash('error', "Insufficient funds on your {$data['account']} balance");
            return back();
        }

        $userAccount->account -= $amount;
        $user->transactions()->create([
            'amount' => $data['amount'],
            'options' => [
                'address' => $data['address'],
                'method' => 'crypto',
                'account' => $data['account'],
                'payment_method_id' => $data['method_id']
            ],
            'type' => 'withdrawal',
            'status' => 'pending'
        ]);
        $userAccount->save();

        session()->flash('success', 'Withdrawal request sent successfully');
        return redirect()->route('user.withdrawals.index');
    }

    public function bankWithdrawal(Request $request)
    {
        $data = $request->validate([
            'amount' => ['required', 'numeric'],
            'bank_name' => ['required'],
            'bank_branch' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
            'routing_number' => ['required'],
            'swift_code' => ['required'],
            'token' => ['required']
        ]);

        $user = User::findOrFail(auth()->user()->id);

        if (RateLimiter::tooManyAttempts('bank-withdraw:' . $user->id, 5,)) {
            session()->flash(
                'error',
                'Too many attempts, you may try in ' . RateLimiter::availableIn('bank-withdraw:' . $user->id) . ' seconds.'
            );
            return back();
        }

        RateLimiter::hit('bank-withdraw:' . $user->id);

        if ($request->input('amount') < 10) {
            return back()->withError('Withdrawal amount cannot be lower than $10');
        }

        $amount = $request->input('amount');
        $userAccount = $user->accounts()->where('type', 'main')->first();

        if ($amount > $userAccount?->account) {
            session()->flash('error', "Insufficient funds on your main balance");
            return back();
        }

        $token = $user->withdrawalTokens()->where('status', 'generated')->where('token', $request->input('token'))->first();

        if (!$token) {
            return back()->withError('Invalid withdrawal token.');
        }

        $token->update([
            'status' => 'used',
        ]);

        $userAccount->account -= $amount;
        $user->transactions()->create([
            'amount' => $data['amount'],
            'options' => [
                'account' => 'main',
                'method' => 'bank',
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'routing_number' => $data['routing_number'],
                'swift_code' => $data['swift_code'],
                'bank_branch' => $data['bank_branch'],
            ],
            'type' => 'withdrawal',
            'status' => 'pending'
        ]);
        $userAccount->save();

        session()->flash('success', 'Withdrawal request sent successfully');
        return redirect()->route('user.withdrawals.index');
    }



    public function validateBankWithdrawal(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric'],
            'bank_name' => ['required'],
            'bank_branch' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
            'routing_number' => ['required'],
            'swift_code' => ['required'],
        ]);

        $user = User::findOrFail(auth()->user()->id);

        if ($request->input('amount') < 10) {
            return back()->withError('Withdrawal amount cannot be lower than $10')->with('data', ['passed' => false]);
        }

        $amount = $request->input('amount');
        $userAccount = $user->accounts()->where('type', 'main')->first();

        if ($amount > $userAccount?->account) {
            session()->flash('error', "Insufficient funds on your main balance");
            return back()->with('data', ['passed' => false]);
        }
        return back()->with('data', ['passed' => true]);
    }

    public function requestToken(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string']
        ]);

        $user = User::findOrFail(auth()->user()->id);

        if (RateLimiter::tooManyAttempts('verify-password:' . $user->id, 5,)) {
            session()->flash(
                'error',
                'Too many attempts, you may try in ' . RateLimiter::availableIn('verify-password:' . $user->id) . ' seconds.'
            );
            return back()->with('data', ['closeModal' => true]);
        }

        RateLimiter::hit('verify-password:' . $user->id);

        if ($user->withdrawalTokens()->where('status', 'pending')->exists()) {
            session()->flash('error', 'You have a pending token request.');
            return back()->with('data', ['closeModal' => true]);
        }


        if (!Hash::check($request->input('password'), $user->password)) {
            session()->flash('error', 'Incorrect password entered.');
            return back();
        }

        $user->withdrawalTokens()->create([]);

        $setting = Settings::first();
        if (!$setting && !is_null($setting?->notification_email)) {
            Mail::to($setting?->notification_email)->send(new TokenRequest($user));
        }

        Mail::to($user)->send(new TokenRequested($user));

        session()->flash('success', 'Withdrawal token request sent, we will get back to you via email.');
        return back()->with('data', ['closeModal' => true]);
    }


}
