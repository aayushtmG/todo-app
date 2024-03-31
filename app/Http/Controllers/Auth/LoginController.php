<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function __construct()
    {
    }
    function index(){
        return view('auth.login');
    }

    function store(Request $req){
        $this->validate($req,[
            'email'=> 'required|max:255',
            'password'=>'required'
        ]);

        if(auth()->attempt($req->only(['email','password']))){
            return redirect()->route('todos');
        }

        return redirect()->back()->withInput($req->only('email'))->withErrors([
                    'incorrectCredentials' => 'Invalid credentials provided',
            ]);

        }

    }
