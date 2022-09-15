<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;


class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        return redirect()->route(
            $request->user()->is_admin == 1
                ? 'admin.index'
                : 'user.index'
        );
    }
}
