<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Sesicontroller extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'isi dulu mas email nya',
            'password.required'=>'isi dulu mas password nya',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif (Auth::user()->role == 'pengguna'){
                return redirect('/pengguna');
            }
        }
        
        if(Auth::attempt($infologin)){
        return redirect('admin');
        }else{
            return redirect('')->withErrors('email dan password yang dimasukan tidak sesuai')->withInput();
        }

        if(Auth::attempt($infologin)){
            return redirect('pengguna');
        }else{
            return redirect('')->withErrors('email dan password yang dimasukan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
