<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function action(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if($user != null){
          // da gestire
        }
        return $user;
    }
}
