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

/**
 * Test route
 */
Route::get('/test', function () {
    $categories = \Illuminate\Support\Facades\DB::table('categories')->get();

    return view('test', [
        'categories' => $categories
    ]);
});
