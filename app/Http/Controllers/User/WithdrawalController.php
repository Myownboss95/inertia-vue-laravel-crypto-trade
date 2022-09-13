<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;

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
            'account_name' => ['required'],
            'account_number' => ['required'],
            'routing_number' => ['required'],
            'swift_code' => ['required'],
        ]);

        $user = User::findOrFail(auth()->user()->id);

        if ($request->input('amount') < 10) {
            return back()->withError('Withdrawal amount cannot be lower than $10');
        }

        $amount = $request->input('amount');
        $userAccount = $user->accounts()->where('type', 'main')->first();

        if ($amount > $userAccount?->account) {
            session()->flash('error', "Insufficient funds on your main balance");
            return back();
        }

        $userAccount->account -= $amount;
        $user->transactions()->create([
            'amount' => $data['amount'],
            'options' => [
                'method' => 'bank',
                'bank_name' => $data['bank_name'],
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'routing_number' => $data['routing_number'],
                'swift_code' => $data['swift_code'],
                'bank_name' => $data['bank_name'],
                'bank_name' => $data['bank_name'],
            ],
            'type' => 'withdrawal',
            'status' => 'pending'
        ]);
        $userAccount->save();

        session()->flash('success', 'Withdrawal request sent successfully');
        return redirect()->route('user.withdrawals.index');
    }


}
