<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        // dd($users);
        return view('users', compact('users'));
    }

    public function action()
    {
        $users = User::all();

        return response()->json($users);
    }
}
