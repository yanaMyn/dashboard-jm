<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function index()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {

        $data = User::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                session(['logged_in' => true]);
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login.index')->with('failed_login', 'Email atau password salah.');
    }

    //logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
