<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){

        // dd($request->all());
        
        $request->request->add(['username' => Str::slug($request->username)]);

        // ? Validation
        $this->validate($request, [
            'name' =>'required|max:40',
            'username' =>'required|min:5|max:15|unique:users',
            'email' =>'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // ? User Creation
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // ? Authentication
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index', auth()->user()->username);

    }

}
