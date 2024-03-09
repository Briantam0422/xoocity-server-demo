<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\Profile\UserProfileController;

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

Route::middleware('auth:sanctum')->group(function (){
});

Route::prefix('user')->group(function (){
    Route::prefix('{user_id}/profile')->group(function (){
        Route::get('get', [UserProfileController::class, 'getProfile']);
        Route::post('update', [UserProfileController::class, 'postUpdateProfile']);
        Route::post('upload-avatar', [UserProfileController::class, 'postUploadAvatar']);
    });
});

Route::prefix('country')->group(function (){
    Route::get('get');
    Route::get('get-list');
});

Route::prefix('province')->group(function (){
    Route::get('get');
    Route::get('get-list');
});

Route::prefix('city')->group(function (){
    Route::get('get');
    Route::get('get-list');
});

Route::prefix('district')->group(function (){
    Route::get('get');
    Route::get('get-list');
});

Route::prefix('county')->group(function (){
    Route::get('get');
    Route::get('get-list');
});

/** Storage **/
Route::get('storage', function (Request $request){
    $path = $request->get('path');
    return \Illuminate\Support\Facades\Storage::response($path);
});
