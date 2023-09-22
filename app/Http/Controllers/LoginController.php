<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function index()
    {
        return view ("login.index");
    }

    function signin(Request $req)
    {
        Validator::make(
            $req->all(),
            [
                'email' => 'required | email',
                'password' => 'required'
            ], []
        )->validate();

        $isi_email = $req->email; //  dari form/inputan user
        $isi_password = $req->password;

        if (Auth::attempt(['email' => $isi_email, 'password' => $isi_password]) == true)
        {
            return redirect ("/");
        }
        else
        {
            return redirect()->back()->withErrors(['password'=>['Invalid email or password']]);
        }
    }

    function signout()
    {
        Auth::logout();
        return redirect("login");   // pindah ke halaman login
    }
}
