<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Validator;

class DepositController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()
            ->where('user_id', auth()->user()->id)
            ->where('type', 'deposit');

        return inertia('user.deposits.index', [
            'deposits' => $query->paginate(),
        ]);
    }

    public function create()
    {
        $payment_methods = PaymentMethod::latest()->where('status', 1)->get();
        return inertia('user.deposits.deposit', [
            'payment_methods' => $payment_methods,
        ]);
    }

    public function validateDeposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'method_id' => ['required'],
            'amount' => ['required', 'numeric'],
            'pay_with' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            session()->flash('validated', false);
            return back()->withErrors($validator)->withInput();
        }

        $method = PaymentMethod::findOrFail($request->input('method_id'));
        $payment_methods = PaymentMethod::latest()->where('status', 1)->get();
        // return inertia('user.deposits.deposit', [
        //     'payment_methods' => $payment_methods,
        //     'method' => $method,
        //     'data' => $validator->valid(),
        //     'validated' => true,
        // ]);
        session()->flash('validated', true);
        return back()->withInput();
    }
}
