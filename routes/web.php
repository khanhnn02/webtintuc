<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;

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

// Route::get('/', function () {    return view('welcome');});
// Route cho quản trị viên
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
});
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');


// Route cho người dùng khách
Route::get('/', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/search', [NewsController::class, 'search']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return 'Chào mừng bạn đến với Dashboard!';
})->middleware('auth');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Chào mừng bạn đến với trang quản trị!';
    })->name('admin.dashboard');
});


