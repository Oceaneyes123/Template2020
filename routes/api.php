<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('addData', 'EntryController@addData');

Route::get('showList', 'EntryController@showList');

Route::post('updateData', 'EntryController@updateData');

Route::post('deleteData', 'EntryController@deleteData');