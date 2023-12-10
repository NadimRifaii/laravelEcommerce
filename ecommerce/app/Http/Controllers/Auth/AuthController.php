<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationReuqest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return [
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'string']
        ];
    }
    public function register(RegistrationReuqest $request)
    {
        $user = User::create($request->validated());
        if ($user) {
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occure while trying to create user'
            ], 500);
        }
    }
    public function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email:filter', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ];
    }
}
