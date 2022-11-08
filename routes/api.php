<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HeloController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookController;
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

Route::get('hy there',function(){
    return ["angger" => "Cantik"];
});

Route::resource('halocontroller', HelloController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('books', BookController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/Books/{id}', [BookController::class, 'show']);
Route::get('/Authors', [AuthorController::class, 'index']);
Route::get('/Authors/{id}', [AuthorController::class, 'show']);


// protected routes
route::middleware('auth:sanctum')->group(function () {
    Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('authors', AuthorController::class)->except('create', 'edit', 'show', 'index');
});



