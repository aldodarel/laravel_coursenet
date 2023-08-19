<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    function register()
    {
        return view("registrasi.registrasi");
    }
}
