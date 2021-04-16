<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:web','prefix' => 'tasks','namespace' => 'employees'],function (){

});
