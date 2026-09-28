<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
    $incomingFields = $request->validate([
        'name' => ['required', 'min:3', 'max:10'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8', 'max:255'],
    ]);
    
    $incomingFields['password'] = bcrypt($incomingFields['password']);
    
    // Create the user
    $user = User::create($incomingFields);

    // This will stop the code and display the inserted user details on your screen
    dd(User::all()->toArray()); 
    }
}
