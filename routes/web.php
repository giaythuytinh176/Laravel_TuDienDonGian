<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/translator", function () {
    return view("translator");
});

Route::post("/translator", function (\Illuminate\Http\Request $request) {

    $list = [
        "english" => "tieng anh",
        "hello" => "xin chao",
    ];
    if ($request->translate && array_key_exists($request->translate, $list) == true) {
        return view("translator", ["meaning" => $list[$request->translate]]);
    }
});


Route::get("/contact", "\App\Http\Controllers\ContactController@ShowContact");


Route::post("/contact", "\\App\\Http\\Controllers\\ContactController@InsertMess");
