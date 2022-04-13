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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/get_users', [App\Http\Controllers\ApiController::class, 'get_users'])->name('get_users');
Route::post('/get_posts', [App\Http\Controllers\ApiController::class, 'get_posts'])->name('get_posts');
Route::post('/get_comments', [App\Http\Controllers\ApiController::class, 'get_comments'])->name('get_comments');
Route::post('/get_comments_by_id', [App\Http\Controllers\ApiController::class, 'get_comments_by_id'])->name('get_comments_by_id');
