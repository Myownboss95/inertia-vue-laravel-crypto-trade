<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerifiedController extends Controller
{
    public function __invoke()
    {
        return inertia('auth.email.verified');
    }
}
