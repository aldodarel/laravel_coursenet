<?php

namespace App\Http\Controllers;

use Dotenv\Validator as DotenvValidator;
use Validator;
use App\Models\Member;
use App\Models\Operation;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

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

        // save ke database
        $data = new Operation;
        $data->input1 = $a;
        $data->input2 = $b;
        $data->operator = $op;
        $data->save();


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
                'value_email' => 'required | min:14 | max:60 | email | unique:members,email',
                'value_password' => 'required | min:8 | confirmed',
                'value_password_confirmation' => 'required | min:8',
                'value_gender' => 'required',
                'value_address' => 'required'
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
        $isi_address = $req->value_address;


        // save ke database, nama variable terserah
        $database = new Member;
        $database->nama = $isi_nama;
        $database->email = $isi_email;
        $database->dob = $isi_dob;
        $database->gender = $isi_gender;
        $database->password = Hash::make($isi_password); // hashing
        $database->address = $isi_address;
        $database->save();

        // return view('home.result', compact('isi_nama', 'isi_email', 'isi_dob', 'isi_gender'));
        return redirect("list-user");
    }

    // menampilkan data members
    function lists()
    {
        // $data = Member::all();
        $data = Member::paginate(2);
        // $data = Member::orderBy("nama")->paginate(2);
        // $data = Member::simplePaginate(2);      // untuk paginate simple panah saja

        return view('home.list', compact('data')); // compact memanggil variabel $data
    }

    function delete(Request $req)
    // Request $req
    {
        // ambil dari form delete yang namenya = "form1"
        $isi_id = $req->form1;

        $model = Member::find($isi_id); // cari data di table members yang idnya = isi_id
        $model->delete();

        return redirect("list-user");
    }

    function update($id)
    {
        $data = Member::find($id);

        return view('home.update', compact('data'));
    }

    function edit(Request $req) // mengambil data yang disubmit dari form
    {
        // validasi
        Validator::make(
            $req->all(),
            [
                'value_name' => 'required | min:5 | max:30 | alpha:ascii',
                'value_email' => 'required | min:14 | max:60 | email',
                'value_gender' => 'required',
                'value_address' => 'required'
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
        $isi_address = $req->value_address;
        $isi_id = $req->value_id;


        // save ke database, nama variable terserah
        $database = Member::find($isi_id); // cari di database yang sesuai dengan mau diedit
        $database->nama = $isi_nama;
        $database->email = $isi_email;
        $database->dob = $isi_dob;
        $database->gender = $isi_gender;
        $database->password = Hash::make($isi_password); // hashing
        $database->address = $isi_address;
        $database->save();

        // return view('home.result', compact('isi_nama', 'isi_email', 'isi_dob', 'isi_gender'));
        return redirect("list-user");
    }
}

// membuat model awal harus kapital seperti UserController mengikuti rule laravel

