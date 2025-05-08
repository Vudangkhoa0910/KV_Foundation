<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // authenticate user
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('identifier', 'password'), [
            'identifier' => 'required|string',
            'password' => 'required|string'
        ], [
            'identifier.required' => 'Email or username is a required field!',
            'password.required' => 'Password is a required field!'
        ]);

        // find user by username or email
        $user = User::where('user_name', $validator->getValue('identifier'))
            ->orWhere('user_email', $validator->getValue('identifier'))
            ->first();

        // check first if user is null, and then password
        if (!$user || !Hash::check($validator->getValue('password'), $user->password)) {
            return redirect()->route('dashboard.login')->withErrors(['invalid_credentials' => 'Username/email or password is invalid!']);
        }

        auth()->login($user);
        return redirect()->intended(route('dashboard.index'));
    }

    // register new user
    public function register(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->only('user_name', 'display_name', 'user_email', 'password'));

            // login user after registration
            session()->regenerateToken();
            auth()->login($user);
            return redirect()->route('dashboard.index');

        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('dashboard.register')
                ->withErrors(['internal_error' => 'An unknown internal error occurred. Try register later or contact the administrator!']);
        }
    }

    // logout a user
    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('dashboard.index');
    }
}
