<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Trade;
use App\Models\Tradeable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    public function index()
    {
        $query = Trade::latest()->where('user_id', auth()->user()->id);

        return inertia('user.trades.index', [
            'trades' => $query->paginate(),
        ]);
    }


    public function trades()
    {
        return inertia('admin.trades.trades');
    }

    public function getTradeables($type)
    {
        $tradeables = [];
        Tradeable::where('type', $type)
            ->get(['id', 'name'])
            ->map(function ($item) use (&$tradeables) {
                $tradeables[$item->id] = $item->name;
            });
        return response()->json(['data' => $tradeables]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => ['required', 'numeric'],'type' => ['required', 'in:buy,sell'],

        ]);

        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->trades()->create(array_merge($data,['status' => 'active', ]));
    }
}
