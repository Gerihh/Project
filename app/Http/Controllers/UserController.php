<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'password.min' => 'A jelszónak legalább 8 karakterből kell állnia',
            'password.regex' => 'A jelszónak legalább egy nagybetűt és egy számot kell tartalmaznia'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response ()->json($errors, 400);
        } else {
            $pw['password'] = bcrypt($request->password);
            $user = User::create($data);
            return response()->json($user, 201);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        if ($user == null) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        } else {
            return response()->json($user);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        if ($user == null) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
