<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = new User();
        $query = $users->newQuery();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where([
                ['last_name', 'LIKE', "%$search%"],
                ['is_admin', '=', 0],
            ]);
            $query->orWhere([
                ['first_name', 'LIKE', "%$search%"],
                ['is_admin', '=', 0],
            ]);
            $query->orWhere([
                ['email', 'LIKE', "%$search%"],
                ['is_admin', '=', 0],
            ]);
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status != 'all') {
                $query->where('status', '=', $status);
            }
        }
        $query->where('is_admin', '=', 0);

        return inertia('admin.users.index', [
            'users' => $query->paginate()->through(function ($user, $key) {
                return $user;
            })->withQueryString(),
        ]);
    }

    public function loginAs(User $user)
    {
        $adminUser = auth()->user();
        auth()->logout();
        session()->put('admin_id', $adminUser->id);
        auth()->loginUsingId($user->id);
        return redirect()->route('user.index');
    }

    public function switchToAdmin(User $user)
    {
        auth()->logout();
        session()->forget('admin_id');
        auth()->loginUsingId($user->id);
        return redirect()->route('admin.index');
    }

    public function addOrRemoveFunds(User $user)
    {
        return inertia('admin.users.add-or-remove-funds', [
            'current_balance' => $user->accountBalance()
        ]);
    }

    public function addFunds(Request $request, User $user)
    {
        $request->validate([
            'amount' => ['required', 'numeric']
        ]);
        $user->accounts()->increment('account', $request->input('amount'));
        return back()->withSuccess('Funds added to user main balance');
    }


    public function deductFunds(Request $request, User $user)
    {
        $request->validate([
            'amount' => ['required', 'numeric']
        ]);
        $user->accounts()->decrement('account', $request->input('amount'));
        return back()->withSuccess('Funds deducted from user main balance');
    }
}
