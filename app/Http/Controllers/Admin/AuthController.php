<?php

namespace App\Http\Controllers\Admin;

use App\Dto\Response\AuthResponse;
use App\Exceptions\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) : AuthResponse
    {
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            throw new AuthException();
        }
        $user = User::where('email', $request->email)->first();

        $user->token = $token;
        return (new AuthResponse())->toDetail($user);
    }
}
