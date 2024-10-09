<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // The user is being remembered...
            $request->session()->regenerate();

            if ($request->email == 'abdul@gmail.com') {
                session(['admin' => true]);
            } else {
                session(['admin' => false]);
            }

            return redirect()->intended('dashboard');
        }

        return redirect()->route('login.index')->with('failed_login', 'Email atau password salah.');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
