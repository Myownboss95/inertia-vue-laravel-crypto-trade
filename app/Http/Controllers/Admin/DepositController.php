<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Transaction::latest()->where('type', 'deposit');

        return inertia('admin.deposits.index', [
            'deposits' => $deposits->paginate(),
        ]);
    }
}
