<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $data['profile'] = (new ImageService)->upload($file);
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

        return to_route('admin.index')->with('success', 'Change Password Successfully.');
    }
}
