<?php

use Illuminate\Support\Facades\Route;

/**
 * Create webhook
 */
Route::post('/create', 'AllController@create');

/**
 * Update webhook
 */
Route::post('/update', 'AllController@update');

/**
 * Delete webhook
 */
Route::post('/delete', 'AllController@delete');
