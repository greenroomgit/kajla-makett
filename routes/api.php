<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/video', 'VideoController', [
    'except' => ['edit', 'show', 'store']
  ]);
Route::get('/guide-steps', 'HomeController@steps', []);
Route::get('/published-photos', 'PhotoUploadsController@published', []);
Route::get('/kits', 'KitsController@list', []);
Route::post('/upload-photo', 'PhotoUploadsController@upload', []);
Route::post('/kit-request', 'KitRequestController@create', []);
Route::post('/kit-request/verify-email/', 'KitRequestController@verifyEmail', []);
