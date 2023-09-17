<?php

use App\Http\Controllers\API\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {

    Route::get('/', function () {
        return response()->json('Daily Confessions API v1');
    });

    Route::resource('category', CategoryApiController::class);
});

Route::get('/', function () {
    return response()->json('TransPay API');
});