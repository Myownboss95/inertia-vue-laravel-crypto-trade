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
}
