<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        $users = [];
        User::where('is_admin', 0)->get(['id', 'name', 'email'])->map(function ($user) use (&$users) {
            $users[$user->id] = $user->name;
        });
        return inertia('admin.email.index', compact('users'));
    }
}
