<?php

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
    return view('index');
});



Route::group(['namespace'=>'Admin' , 'prefix'=>'admin'] , function (){

    $this->get('/',function (){ return view('Admin.index');});
    $this->resource('/about','AboutController');
    $this->resource('/contact','ContactUsController');
});









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
