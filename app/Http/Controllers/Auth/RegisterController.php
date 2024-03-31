<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    function index(){
        return view('auth.register');
    }
    function store(Request $req){
        $this->validate($req,[
            'name'=> 'required|max:255',
            'email'=> 'email|required|max:255',
            'password'=> 'required|confirmed'
        ]);

        User::create([
            'name'=> $req->name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password)
        ]);

        auth()->attempt($req->only(['email','password']));

        return redirect()->route('home');
    } 
}
