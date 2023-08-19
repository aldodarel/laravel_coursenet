<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view ("home.index");
    }

    function about(){
        // echo "Created by aldoo";
        return view("home.about");
    }

    function product($brand){
        // echo 'Product ' . ' dijual di toko saya';
        // echo 'Product $brand dijual di toko saya';
       return view("home.product", compact('brand'));
    }

    function productDetail($hp, $seri){
        return view ("home.productDetail", compact('hp', 'seri'));
    }

    function welcome(){
        return view("welcome");
    }
}
