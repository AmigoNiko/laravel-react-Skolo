<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInformationController;

// CRUD routes for managing user information
Route::resource('userInformation', UserInformationController::class);


Route::get('/', function () {
    return view('welcome');
});
