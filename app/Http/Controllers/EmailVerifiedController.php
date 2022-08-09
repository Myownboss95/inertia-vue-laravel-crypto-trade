<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerifiedController extends Controller
{
    public function verified()
    {
        return inertia('auth.email.verified');
    }

    public function correctInfo(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $email = $user->email;
        $user->delete();
        auth()->logout();
        session()->invalidate();
        session()->regenerate();
        return redirect()->route('register')->withEmail($email);
    }
}
