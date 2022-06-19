<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
Route::get('admin',[AdminController::class, 'index'])->name('admin.index');
Route::post('admin/auth',[AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dasboard',[AdminController::class, 'dashboard'])->name('admin.dasboard');
    // Route::get('admin/login',[AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Successfully');
        return redirect(route('admin.index'));
    })->name('admin.logout');

    Route::resource('admin/category', CategoryController::class);
});