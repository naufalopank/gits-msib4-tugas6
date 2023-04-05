<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('layouts.user.register');
    }

    public function login(Request $request)
    {
        return view('layouts.user.login');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:' . User::class . '|max:100',
            'password' => ['required', 'confirmed', Password::defaults()],
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $imgUrl = time() . '-' .$request->nama_produk . '.' . $request->foto->extension();

        $request->foto->move(public_path('user'), $imgUrl);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $imgUrl
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => ['required', Password::defaults()],
            // 'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
