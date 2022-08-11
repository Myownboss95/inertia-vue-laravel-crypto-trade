<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function index()
    {
        $query = Trade::latest()->where('user_id', auth()->user()->id);

        return inertia('user.trades.index', [
            'trades' => $query->paginate(),
        ]);
    }
}
