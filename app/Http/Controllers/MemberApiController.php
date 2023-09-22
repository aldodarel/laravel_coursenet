<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Hash;

class MemberApiController extends Controller
{
    public function add(Request $r)
    {
        $model = new Member;
        $model->nama = $r->input("a");
        $model->email = $r->input("b");
        $model->password = Hash::make($r->input("c"));
        $model->dob = $r->input("d");
        $model->gender = $r->input("e");
        $model->address = $r->input("f");
        $model->save();

        // API-nya sesuai kebutuhan
        return response()->json([
            "status" => true,
            "model" => $model,
        ]);

    }

    public function list()
    {
        $data = Member::all();
        return response()->json([
            "status" => true,
            "data" => $data,

        ]);
    }

    public function edit(Request $r)
    {
        $model = Member::find($r->input("id")); // edit/update berdasarkan id
        $model->nama = $r->input("a");
        $model->email = $r->input("b");
        $model->password = Hash::make($r->input("c"));
        $model->dob = $r->input("d");
        $model->gender = $r->input("e");
        $model->address = $r->input("f");
        $model->save();

        // API-nya sesuai kebutuhan
        return response()->json([
            "status" => true,
            "model" => $model,
        ]);

    }

    public function remove($id)
    {
        $model = Member::find($id);
        $model -> delete();

        return response()->json([
            "status" => true

        ]);
    }
}
