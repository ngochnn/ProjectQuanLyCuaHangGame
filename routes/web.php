<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IntroproductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

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

    // $users = DB::table('users')->get();
    // return view('user.userlist',  ['users' => $users]);
    return view('Home.admin');
});


Route::resource('users', UserController::class)->middleware(['auth','role:admin']);

Route::resource('profiles', ProfileController::class)->middleware(['auth','role:admin']);

Route::resource('products', ProductController::class)->middleware(['auth','role:editor']);

Route::resource('introproducts', IntroproductController::class);
Auth::routes();

Route::resource('articles', ArticleController::class)->middleware(['auth','role:admin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
