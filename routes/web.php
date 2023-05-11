<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Models\Message; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('layouts.master');
});
Route::get('/book', function () {
    return view('dashboard.book');
});
Route::get('/category', function () {
    return view('dashboard.category');
});
Route::get('/index', function () {
    return view('dashboard.index');
});
Route::get('/rent-logs', function () {
    return view('dashboard.rent-log');
});
// Route::get('/user', function () {
//     return view('dashboard.user');
// });



// message
Route::post('/store', [MessageController::class, 'storeMessage'])->name('store');
// register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/registerStore', [AuthController::class, 'storeRegister'])->name('registerStore');
// login
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/loginAuth', [AuthController::class, 'auth'])->name('auth');

// atmin
Route::get('/user', [AdminController::class, 'indexUsers'])->name('indexUser')->middleware('admin')->middleware('auth');
Route::get('/editUser/{id}', [AdminController::class, 'indexEditUser'])->name('indexEditUser');
Route::post('/updateE/{id}', [AdminController::class, 'updateIndex'])->name('updateIndex');
Route::post('/delete/{id}', [AdminController::class, 'delete'])->name('delete');

// book
Route::get('/book', [BookController::class, 'book'])->name('book');
Route::get('/form', [BookController::class, 'form']);
Route::post('/book', [BookController::class, 'add'])->name('add');
Route::get('/book/form', [BookController::class, 'form'])->name('form');
Route::post('/delete/{id}', [BookController::class, 'delete'])->name('delete');

// user
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth')->middleware('User');