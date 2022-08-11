<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class OnboardController extends Controller
{
    public function onboardPage()
    {
        $user = User::findOrFail(request()->user()->id);

        if (!empty($user->first_name . $user->last_name)) {
            return $this->toUploadPage();
        }
        $service = new LocationService();
        return inertia('user.onboarding.address', [
            'countries' => $service->countries(),
        ]);
    }

    public function submitAddress(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        if (!empty($user->first_name . $user->last_name)) {
            return $this->toUploadPage();
        }

        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
            'zip_code' => ['required', 'string', 'max:191'],
        ]);

        // dd($user);
        $user->update($data);
        session()->flash('success', 'KYC verification data submited');
        return $this->toUploadPage();
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
            return $this->toUploadPage();
        }
        return inertia('user.onboarding.upload');
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

        if ($request->hasFile('photograpgh')) {
            $file = $this->uploadFile($request->file('photograpgh'), 'profile_pictures');
            $user->update([
                'photo' => $file,
                'type' => $request->input('type'),
            ]);
        }

        return redirect()
            ->route('user.index')
            ->withSuccess('Your verification details have been submitted');
    }

    private function uploadFile(UploadedFile $file, string $dir)
    {
        $filename = time() . "{$file->getClientOriginalName()}.{$file->extension()}";
        Storage::disk('local')->putFileAs($dir, $file, $filename);
        return $filename;
    }
}
