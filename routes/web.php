<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('tes');

Route::get('/login', [UserController::class, 'loginForm']);
Route::post('/login-submit', [UserController::class, 'loginSubmit'])->name('cobalogin');

Route::get('/regis', [UserController::class, 'regisForm']);
Route::post('/regis-submit', [UserController::class, 'regisSubmit']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/user/{id}/delete', [UserController::class, 'delete']);
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::post('/user/{id}/update', [UserController::class, 'update']);

use App\Http\Controllers\rapotController;

Route::get('/rapot', [rapotController::class, 'index']);

Route::get('/form-rapot', [rapotController::class, 'create']);
Route::post('/submit-rapot', [rapotController::class, 'store']);

Route::get('/rapot/{id}/delete', [rapotController::class, 'destroy']);
Route::get('/rapot/{id}/edit', [rapotController::class, 'edit']);
Route::post('/rapot/{id}/update', [rapotController::class, 'update']);
Route::get('/rapot/{fk_user}/nilai', [rapotController::class, 'show']);
