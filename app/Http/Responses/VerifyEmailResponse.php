<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\VerifyEmailResponse as VerifyEmailResponseContract;


class VerifyEmailResponse implements VerifyEmailResponseContract
{
    public function toResponse($request)
    {
        $to = $request->user()->is_admin === 1 ? route('admin.index') : route('user.index');
        return redirect()->intended($to);
    }
}
