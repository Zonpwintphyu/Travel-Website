<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register',[AuthController::class,'create']);
    Route::post('/register',[AuthController::class,'store']);
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'post_login']);
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'show'])->name('post#show');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('post/showmore/{id}', [PostController::class, 'showmore'])->name('post#showmore');
});

Route::middleware(['auth','can:admin'])->group(function () {
    Route::get('post/updatePage/{id}', [PostController::class, 'updatePage'])->name('post#updatePage');
    Route::get('post/editPage/{id}', [PostController::class, 'editPage'])->name('post#editPage');
    Route::post('post/update', [PostController::class, 'update'])->name('post#update');
    Route::post('post/create', [PostController::class, 'postCreate'])->name('post#create');
    Route::get('post/delete/{id}', [PostController::class, 'postDelete'])->name('post#delete');
    Route::get('admin/createPage', [PostController::class, 'create'])->name('post#createPage');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('post#home');
    Route::get('/verify-account', [UserController::class, 'verifyaccount'])->name('verifyAccount');
    Route::post('/verifyotp', [UserController::class, 'useractivation'])->name('verifyotp');
    Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
});


//email


