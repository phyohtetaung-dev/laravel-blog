<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'User Logout Successfully.');
    }

    public function profile(Request $request)
    {
        $user = User::find(auth()->id());

        return view('admin.profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = User::find(auth()->id());

        return view('admin.edit-profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $dir = sprintf('images/%s/%s/%s', date('Y'), date('m'), date('d'));
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = md5(round(microtime(true) * 1000).str()->random(6).$originalName).'.'.$extension;
            $path = $file->storeAs($dir, $name);
            $data['profile'] = Storage::url($path);
        }
        $user->update($data);

        return to_route('admin.profile')->with('success', 'Profile was successfully updated.');
    }

    public function changePassword(Request $request)
    {
        return view('admin.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update([
            'new_password' => Hash::make($data['new_password']),
        ]);

        return redirect('/')->with('success', 'Change Password Successfully.');
    }
}
