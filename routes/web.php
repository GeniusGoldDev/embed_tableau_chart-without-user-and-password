<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableauController;

Route::get('/generate-token', [TableauController::class, 'generateJWT']);
Route::get('/embed-tableau', [TableauController::class, 'showDashboard']);

Route::get('/', function () {
    return view('welcome');
});
