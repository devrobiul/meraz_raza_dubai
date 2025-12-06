<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.pages.profile.index');
    }
    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        // Check avatar exists AND valid
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {

            // Delete old avatar if exists
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                unlink(public_path($user->avatar));
            }
            $user->avatar = uploadFile($request->file('avatar'));
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        flash()->success('Your data updated successfully');
        return back();
    }


    public function passwordUpdate(Request $request)
    {
     
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            flash()->error('Your current password is incorrect');
            return back();
        }
        $user->update([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);
        Auth::logoutOtherDevices($request->password);
        DB::table('sessions')->truncate();
        Auth::login($user);
        flash()->success('Your password has been updated and all other sessions have been logged out.');

        return back();
    }
}
