<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailMailable;
use Mail;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class MailController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->where('is_admin', 0)
            ->get();
        $filteredUsers = ['Select User'];
        $users->map(function ($user) use (&$filteredUsers) {
            $filteredUsers[$user->id] = "$user->first_name $user->last_name";
        });
        return inertia('admin.mail.send', ['users' => $filteredUsers]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'user' => ['required', 'numeric', 'exists:users,id'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'attachment' => ['nullable', 'file',],
        ]);

        $user = User::find($request->input('user'));

        Mail::to($user)
            ->send(
                new SendEmailMailable(
                    $request->input('subject'),
                    $request->input('message'),
                    [$request->file('attachment')]
                )
            );
        session()->flash('success', 'Email sent successfully');
        return back();
    }
}
