<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Controllers\Controller;
use App\Mail\Kyc\Uploaded;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Mail;

class OnboardController extends Controller
{
    public function onboardPage()
    {
        $user = User::findOrFail(request()->user()->id);

        if (!empty($user->first_name . $user->last_name) && config('app.id_verification')) {
            return $this->toUploadPage();
        }
        $service = new LocationService();
        return inertia('auth.onboarding.address', [
            'countries' => $service->countries(),
        ]);
    }

    public function submitAddress(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        if (!empty($user->first_name . $user->last_name) && config('app.id_verification')) {
            return $this->toUploadPage();
        }

        $data = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:users'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'zip_code' => ['required', 'string'],
        ]);

        // dd($user);
        $user->update($data);
        session()->flash('success', 'KYC verification data submited');
        if (config('app.id_verification')) {
            return $this->toUploadPage();
        }
        return redirect()->route('user.index');
    }

    public function toUploadPage()
    {
        return redirect()->route('user.onboard.upload');
    }

    public function toAddressPage()
    {
        return redirect()->route('user.onboard.address');
    }



    public function uploadPage()
    {
        $user = User::findOrFail(request()->user()->id);
        if (empty($user->first_name . $user->last_name)) {
            return $this->toAddressPage();
        }

        if (config('app.id_verification')) {
            return inertia('auth.onboarding.upload');
        }
        return redirect()->route('user.index');
    }

    public function upload(Request $request)
    {
        $user = User::findOrFail(request()->user()->id);
        if (empty($user->first_name . $user->last_name)) {
            return $this->toUploadPage();
        }
        $typeCheck = $request->input('type') === 'identity' || $request->input('type') === 'licence';
        $request->validate([
            'type' => ['required', 'string'],
            'back' => ['nullable', Rule::requiredIf($typeCheck), 'mimes:jpg,jpeg,png,webp'],
            'front' => ['nullable', Rule::requiredIf($typeCheck), 'mimes:jpg,jpeg,png,webp'],
            'datapage' => ['nullable', Rule::requiredIf(!$typeCheck), 'mimes:jpg,jpeg,png,webp'],
            'photograph' => ['required', 'mimes:jpg,jpeg,png,webp'],
        ]);

        if ($request->hasFile('back')) {
            $file = $this->uploadFile($request->file('back'), 'documents');
            $user->documents()->create([
                'document' => $file,
                'type' => $request->input('type'),
            ]);
        }

        if ($request->hasFile('front')) {
            $file = $this->uploadFile($request->file('front'), 'documents');
            $user->documents()->create([
                'document' => $file,
                'type' => $request->input('type'),
                'front' => true
            ]);
        }

        if ($request->hasFile('datapage')) {
            $file = $this->uploadFile($request->file('datapage'), 'documents');
            $user->documents()->create([
                'document' => $file,
                'type' => $request->input('type'),
            ]);
        }

        if ($request->hasFile('photograph')) {
            $file = $this->uploadFile($request->file('photograph'), 'profile_pictures');
            $user->update(['image' => $file,]);
        }

        Mail::to($user)->send(new Uploaded($user));

        return redirect()
            ->route('user.index')
            ->withSuccess('Your verification details have been submitted');
    }

    private function uploadFile(UploadedFile $file, string $dir)
    {
        $filename = time() . rand() . "{$file->getClientOriginalName()}";
        Storage::disk('public')->putFileAs($dir, $file, $filename);
        return $filename;
    }

    public function submitted()
    {
        if (auth()->user()->status != 'pending') {
            return redirect()->route('user.index');
        }
        return inertia('auth.onboarding.submitted');
    }
}
