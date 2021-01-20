<?php

use Illuminate\Support\Facades\Route;

Route::get('/articel', [
    'middleware' => ['xss', 'https'],
    'uses' => 'ArticelController@select'
]);

Route::get('/articels', [
    'middleware' => ['xss', 'https'],
    'uses' => 'ArticelController@view'
]);
