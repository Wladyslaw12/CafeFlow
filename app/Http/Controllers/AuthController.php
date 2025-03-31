<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(
            [
                'email' => $request['email'],
                'password' => $request['password']
            ])
        ) {
            return to_route('start')->with('success', 'Вход успешен');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('success', 'Выход успешен');
    }
}
