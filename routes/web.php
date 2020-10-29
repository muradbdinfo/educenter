<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/frontend', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend');
Route::get('/backend', [App\Http\Controllers\Backend\BackendController::class, 'index'])->name('backend');

Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'index'])->name('logout');


// ACL  Start

Route::get('/userlist1', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserList_byAdmin'])->name('userlist1');
Route::get('/userlist2', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserList_byManager'])->name('userlist2');
Route::get('/useredit/{id}', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserEdit'])->name('useredit');
Route::post('/userupdate', [App\Http\Controllers\Backend\ACL\AclController::class, 'UpdateUser'])->name('userupdate');

Route::get('/userdelete/{id}', [App\Http\Controllers\Backend\ACL\AclController::class, 'UserDelete'])->name('userdelete');


