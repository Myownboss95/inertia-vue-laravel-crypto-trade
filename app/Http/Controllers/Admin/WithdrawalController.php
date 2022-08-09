<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawalController extends Controller
{
    public function index()
    {
        $query = Transaction::latest()->where('type', 'withdrawal');

        return inertia('admin.withdrawals.index', [
            'withdrawals' => $query->paginate(),
        ]);
    }
}
