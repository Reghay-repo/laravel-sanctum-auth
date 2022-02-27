<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register (Request $request)
    {
        $request->validate([
            'name' => ['required'], 
            'email' => ['required', 'email', 'unique:users'], 
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => ['min:8','required'] 
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
