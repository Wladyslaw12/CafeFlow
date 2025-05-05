<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterDirRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->back()->withErrors('Неверный логин или пароль');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('success', 'Выход успешен');
    }

    public function register(RegisterRequest $request)
    {
        Establishment::create($request->validated());

        return to_route('registerDir');
    }

    public function registerDir(RegisterDirRequest $request)
    {
        User::create(
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'establishment_id' => Establishment::query()->latest()->first()->id,
                'role_id' => 1
            ]
        );

        return to_route('start');
    }
}
