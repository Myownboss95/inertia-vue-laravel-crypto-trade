<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Withdrawal\Approved;
use App\Mail\Withdrawal\Declined;
use App\Mail\Withdrawal\SendToken;
use App\Models\WithdrawalToken;
use Mail;
use Str;

class WithdrawalController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()->where('type', 'withdrawal')->with('user');

        return inertia('admin.withdrawals.index', [
            'withdrawals' => $query->paginate(),
        ]);
    }


    public function approve($id)
    {
        $transaction = Transaction::findOrFail($id);
        $user = $transaction->user;
        $transaction->update([
            'status' => 'successful'
        ]);
        Mail::to($user)->send(new Approved($user, $transaction));
        session()->flash('success', 'Withdrawal approved');
        return back();
    }

    public function decline($id)
    {
        $transaction = Transaction::findOrFail($id);
        $user = $transaction->user;
        $transaction->update(['status' => 'failed']);
        $user->accounts()->where('type', $transaction?->options?->account ?? 'main')->increment('account', $transaction->amount);
        Mail::to($user)->send(new Declined($user, $transaction));
        session()->flash('success', 'Withdrawal declined');
        return back();
    }

    public function tokenRequests()
    {
        $requests = WithdrawalToken::where('status', 'pending')->with('user');
        return inertia('admin.withdrawals.token-requests', [
            'requests' => $requests->paginate()
        ]);
    }

    public function generateToken($id)
    {
        $token = Str::random(8);
        $withdrawalToken = WithdrawalToken::findOrFail($id);
        $update = $withdrawalToken->update([
            'status' => 'generated',
            'token' => $token
        ]);

        if ($update) {
            Mail::to($withdrawalToken->user)->send(new SendToken($withdrawalToken->user, $token));;
            return back()->withSuccess('Withdrawal token generated');
        }

        return back()->withError('Withdrawal token failed to generate');
    }
}
