<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  http://localhost:8000
Route::get('/', function () {
    echo "Welcome to my website";
});

//  http://localhost:8000/about
Route::get('/about', function () {
    echo "Created by aldo";
});

//  http://localhost:8000/feedback
// Route::get("feedback/{brandxx}", function ($brandxx) {
//     echo "Thank you for visiting us and give your feedback. gift from $brandxx";
// });


// {brand} => path variable
Route::get("product/{brand}", function($brand) {
    echo "Product $brand dijual di toko saya";
})->where('brand', 'samsung|oppo|lenovo|apple');


//  http://localhost:8000/product/samsung/galaxy => Product dengan brand samsung dan seri galaxy
//  http://localhost:8000/product/oppo/b9000 => Product dengan brand oppo dan seri b9000


Route::get("product/{hp}/{seri}", function($hp, $seri) {
    echo "Product dengan brand $hp dengan seri $seri";
});


// http://localhost:8000/calculator/add/2/3  ===> 2 + 3 = 5
// http://localhost:8000/calculator/add/5/2  ===> 5 + 2 = 7
// http://localhost:8000/calculator/subtract/2/3  ===> 2 - 3 = -1
// http://localhost:8000/calculator/subtract/5/2  ===> 5 - 2 = 3
// http://localhost:8000/calculator/multiply/4/2  ===> 4 * 2 = 8
// http://localhost:8000/calculator/multiply/8/2  ===> 8 / 2 = 4
// http://localhost:8000/calculator/divide/8/2  ===> 10 / 2 = 5

Route::get("/calculator/{op}/{a}/{b}", function($op, $a, $b) {
    $str = strtolower($op);
    if($str == 'add'){
    $symbol = '+';
    $result = $a + $b;
    echo "Hasil dari $a $symbol $b adalah $result.";
    }
    else if($str == 'subtract')
    {
    $symbol = '-';
    $result = $a - $b;
    echo "Hasil dari $a $symbol $b adalah $result.";
    }
    else if($str == 'multiply')
    {
    $symbol = '*';
    $result = $a * $b;
    echo "Hasil dari $a $symbol $b adalah $result.";
    }
    else if($str == 'divide')
    {
    if ($b != 0){
    $symbol = '/';
    $result = $a / $b;
    echo "Hasil dari  $a $symbol $b adalah $result.";
    }
    else {
        echo "Tidak bisa dibagi dengan 0.";
        // return;
    }}
     else {
    echo "Inputan variabel $op belum tepat";
    }
});
