<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});


Route::middleware(['jwt.verify'])->group(function () {
        
    Route::get('/posts' , [PostController::class , 'index']);
    Route::get('/post/{id}' , [PostController::class , 'single_post']);
    Route::get('/delete_post/{id}' , [PostController::class , 'delete_post']);
        
    Route::post('/store_post' , [PostController::class , 'store_post']);
    Route::post('/update_post/{id}' , [PostController::class , 'update_post']);
});


