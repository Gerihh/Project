<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //Validálás
        $data = $request->all();

        $rules = [
            'username' =>'required|unique:users|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[0-9])/'
        ];
        $messages = [
            'username.required' => 'Felhasználónév megadása kötelező',
            'username.unique' => 'A megadott felhasználónév már foglalt',
            'username.min' => 'A felhasználónév legalább 6 karakter hosszú kell legyen',
            'email.required' => 'E-mail cím megadása kötelező',
            'email.email' => 'Érvénytelen e-mail cím',
            'email.unique' => 'A megadott e-mail cím már foglalt',
            'password.required' => 'Jelszó megadása kötelező',
            'password.string' => 'A jelszónak karaktereket kell tartalmaznia',
            'password.min' => 'A jelszónak legalább 8 karakterből kell állnia',
            'password.regex' => 'A jelszónak legalább egy nagybetűt és egy számot kell tartalmaznia'
        ];


        $validator = Validator::make($data, $rules, $messages);

        //Validálás check
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response ()->json($errors, 400);
        } else { //User létrehozása
            $data['password'] = bcrypt($request->password);
            $user = User::create($data);
    }
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
