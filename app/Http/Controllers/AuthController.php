<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(NewUserRequest $request)
    {
        //Validálás

        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        //Token kreálás
        $token = $user->createToken('authToken')->accessToken;

        return response()->json([
            'user' => $user,
            'accessToken' => $token,
        ]);
    }
    public function login(Request $request)
    {

    }
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {

    }
    public function user()
    {
        $user = Auth::user();

        return response()->json($user);
    }
}
