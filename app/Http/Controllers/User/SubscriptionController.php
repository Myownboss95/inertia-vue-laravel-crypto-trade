<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function plans()
    {
        $plans = Plan::latest()->with('features')->get();
        return inertia('user.subscriptions', [
            'plans' => $plans
        ]);
    }

    public function subscribe(Plan $plan)
    {
        $user = User::findOrFail(auth()->user()->id);
        $account = $user->accounts()->where('type', 'main')->first();
        $amount = $account?->account ?? 0;
        if ($plan->max_investment < $amount) {
            $account->account -= $plan->max_investment;
        } elseif ($plan->max_investment < $amount && $amount > $plan->min_investment) {
            $account->account -= $plan->min_investment;
        } else {
            session()->flash('info', 'You do not have enough balance to subscribe to this plan. Make a deposit');
            return redirect()->route('user.deposits.create');
        }

        dd($amount);

        dd($plan);
    }
}
