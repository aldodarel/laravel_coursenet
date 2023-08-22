<?php

namespace App\Http\Controllers;

use Dotenv\Validator as DotenvValidator;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function user()
    {
        return view('home.index');
    }


    function operator(Request $req)
    {
        Validator::make(
            $req->all(),
            [
                'input1' => 'required',
                'input2' => 'required',
                'v_operator' => 'required'
            ],
            [
                'input1.required' => 'Wajib input angka, silakan coba lagi',
                'input2.required' => 'Wajib input angka, silakan coba lagi'
            ])->validate();



        $a = $req->input1;
        $b = $req->input2;
        $op = $req->v_operator;

        $str = strtolower($op);
        if ($str == 'add') {
            $symbol = '+';
            $result = $a + $b;
            // echo "Hasil dari $a $symbol $b adalah $result.";
        } else if ($str == 'subtract') {
            $symbol = '-';
            $result = $a - $b;
            // echo "Hasil dari $a $symbol $b adalah $result.";
        } else if ($str == 'multiply') {
            $symbol = '*';
            $result = $a * $b;
            // echo "Hasil dari $a $symbol $b adalah $result.";
        } else if ($str == 'divide') {
            if ($b != 0) {
                $symbol = '/';
                $result = $a / $b;
                // echo "Hasil dari  $a $symbol $b adalah $result.";
            } else {
                // echo "Tidak bisa dibagi dengan 0.";
                // return;
            }
        } else {
            // echo "Inputan variabel $op belum tepat";
        }


        return view('home.hasil', compact('a', 'b', 'result', 'symbol'));
    }


    function hitung(){
        return view('home.calculator');
    }


    function save(Request $req)
    {
        // validasi
        Validator::make(
            $req->all(),
            [
                'value_name' => 'required | min:5 | max:30 | alpha:ascii',
                'value_email' => 'required | min:14 | max:60 | email',
                'value_password' => 'required | min:8 | confirmed',
                'value_password_confirmation' => 'required | min:8',
                'value_gender' => 'required'
            ],
            [
                'value_name.max' => 'nama maksimal 30 karakter',
                'value_password_confirmation.confirmed' => 'Password harus sama dengan Confirm password',
                'value_name.min' => 'Password harus minimal 5 karakter',
            ]
        )->validate();


        // echo $req->value_name . " " . $req->value_email;
        // name, email, password, dob, gender ??
        // Request
        $isi_nama = $req->value_name;
        $isi_email = $req->value_email;
        $isi_password = $req->value_password;
        $confirm_password = $req->value_confirm_pw;
        $isi_dob = $req->value_date;
        $isi_gender = $req->value_gender;

        return view('home.result', compact('isi_nama', 'isi_email', 'isi_dob', 'isi_gender'));
    }
}
