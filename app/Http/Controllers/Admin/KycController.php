<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LocationService;

class KycController extends Controller
{
    public function index()
    {
        $service = new LocationService();

        $users = User::with(['documents'])
            ->where('is_admin', 0)
            ->whereHas('documents')
            ->where('status', 'pending')
            ->paginate()
            ->through(function (User $user) use ($service) {
                $user->state = $service->getState($user->country, $user->state);
                $user->country = $service->getCountry($user->country);
                return $user;
            });
        return inertia('admin.users.kyc', [
            'users' => $users
        ]);
    }

    public function approve(User $user)
    {
        $user->update([
            'status' => 'active'
        ]);
        session()->flash('success', 'User approved');
        return back();
    }


    public function decline(User $user)
    {
        $user->update([
            'status' => 'active'
        ]);
        session()->flash('success', 'User declined');
        return back();
    }
}
