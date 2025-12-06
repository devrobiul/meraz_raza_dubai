<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginStore(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user);
            session()->flash('success', 'Successfully logged In');
            return \redirect()->intended(route('admin.dashboard'));
        } else {
            session()->flash('error', 'Something went to wrong!');
            return back();
        }
    }
}
