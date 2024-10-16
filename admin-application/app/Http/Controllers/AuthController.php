<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            // Jika sudah login, redirect ke halaman dashboard atau branch
            return redirect()->route('branch.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate request input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Login process
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->is_superadmin) {
                return redirect()->route('branch.index');
            }
        }

        return redirect()->back()->withErrors([
            'message' => 'Username or password is incorrect',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
