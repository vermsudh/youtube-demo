<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
    $incomingFields = $request->validate([
        'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'min:8', 'max:255'],
    ]);

    $incomingFields['password'] = bcrypt($incomingFields['password']);
    
    // Create the user
    $user = User::create($incomingFields);
    //in order to authorize any user?
    auth()->login($user);

    return redirect('/');
    // This will stop the code and display the inserted user details on your screen
    dd(User::all()->toArray()); 
    }

    public function logout(){
        auth()-> logout();
        return redirect('/');
    }

    public function login(Request $request){

    $incomingFields = $request-> validate(
        [
            'loginName' => 'required',
            'loginPassword'=> 'required'
        ]
    );

    if(auth()->attempt(['name' => $incomingFields['loginName'], 'password' => $incomingFields['loginPassword']])){
        $request->session()->regenerate();
    }

    return redirect('/');

    }
}
