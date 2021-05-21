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


Route::get('/test', function () {
    $url = "https://online.moysklad.ru/api/remap/1.2/entity/productfolder/69926c81-ba2e-11eb-0a80-02cc000b9ba0";

    $war = new \Zelvad\MyWarehouse\Http\HttpClient(env('MY_WAREHOUSE_API_TOKEN'));

    dd($war->curl($url, 'GET'));
});
