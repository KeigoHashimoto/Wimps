<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\WhinesController;
use App\Http\Controllers\SympathyController;
use Auth;

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
/**
 * welcome
 */
Route::middleware(['guest:web'])->group(function(){
    Route::get('/',function(){
        return view('welcome');
    });
});

/**
 * guest login
 */
Route::post('/login/guest',[UserController::class,'guestLogin'])->name('guestLogin');
/**
 * ゲストが会員登録したい場合
 */
Route::middleware(['auth'])->group(function(){
    Route::get('register',function(){
        Auth::logout();
        return view('users.register');
    })->name('guest.register');
});

//未ログインユーザ function
Route::prefix('user')->name('user.')->group(function() {
    Route::middleware(['guest:web'])->group(function() {
        // register view
        Route::get('register',function(){
            return view('users.register');
        })->name('register');

        // login view
        Route::get('login',function(){
            return view('users.login');
        })->name('login');

        // register function
        Route::post('store',[UserController::class,'store'])->name('store');

        // login function
        Route::post('doLogin',[UserController::class,'doLogin'])->name('doLogin');
    });
});

//login user function
Route::prefix('user')->name('user.')->group(function() {
    Route::middleware(['auth:web'])->group(function() {
        //logout function
        Route::post('logout',[UserController::class,'logout'])->name('logout');

        //home page
        Route::get('/',[UserController::class,'home'])->name('home');

        //setting page
        Route::get('setting',[UserController::class,'setting'])->name('setting');

        //update
        Route::put('update',[UserController::class,'update'])->name('update');

        //favorites
        Route::get('favorites',[UserController::class,'favorites'])->name('favorites');

    });
});

//whine function
Route::prefix('whine')->name('whine.')->group(function() {
    Route::middleware(['auth:web'])->group(function() {
        //whine post
        Route::post('post',[WhinesController::class,'post'])->name('post'); 

        //whine edit
        Route::post('{id}/edit',[WhinesController::class,'edit'])->name('edit'); 

        //whine delete
        Route::delete('{id}/delete',[WhinesController::class,'destroy'])->name('delete'); 
    });
});

//sympathy function
Route::prefix('sympathy/{whineId}')->name('sympathy.')->group(function() {
    Route::middleware(['auth:web'])->group(function() {
        //liked
        Route::get('liked',[SympathyController::class,'liked'])->name('liked');
        //add sympathy
        Route::post('add_sympathy',[SympathyController::class,'add_sympathy'])->name('add'); 
        //remove sympathy
        Route::post('remove_sympathy',[SympathyController::class,'remove_sympathy'])->name('remove'); 
    });
});
