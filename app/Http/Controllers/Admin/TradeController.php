<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::with(['tradeable', 'user'])->latest();

        return inertia('admin.trades.index', [
            'trades' => $trades->paginate(),
        ]);
    }

}
