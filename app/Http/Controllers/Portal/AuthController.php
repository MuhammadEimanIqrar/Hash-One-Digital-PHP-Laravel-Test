<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAttemptRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('portal.auth.login');
    }

    public function loginAttempt(LoginAttemptRequest $request)
    {
        try {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials)) {
                if (isSuperAdmin()) {
                    return redirect()->route('portal.index')->with([
                        'success' => 'Successfully Logged In',
                        'welcome' => 'Welcome Back ' . user()->name . '!',
                    ]);
                } else {
                    Auth::logout();
                    return back()->with(errorType(), 'You are not authorized for this action');
                }
            } else {
                return back()->with(errorType(), 'Invalid credentials or maybe you are not authorized for this access');
            }
        } catch (\Throwable $th) {
            abort(403);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('portal.auth.login')->with(successType(), 'Logged Out Successfully');
    }
}
