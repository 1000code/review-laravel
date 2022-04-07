<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UploaFileController;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'Index'])->name('admin.home')->middleware('isAdmin');

    Route::get('/admin/book', [BookController::class, 'Index'])->name('admin.book')->middleware('isAdmin');
    Route::get('/admin/book/add', [BookController::class, 'FormAdd'])->name('admin.book.form.add')->middleware('isAdmin');
    Route::post('/admin/book/store', [BookController::class, 'Store'])->name('admin.book.store')->middleware('isAdmin');

    Route::get('/admin/book/update/{code}', [BookController::class, 'FormUpdate'])->middleware('isAdmin');
    Route::post('/admin/book-update/', [BookController::class, 'Update'])->name('admin.book.update')->middleware('isAdmin');

    Route::post('/admin/book/remove', [BookController::class, 'Remove'])->name('admin.book.remove')->middleware('isAdmin');

    Route::get('/member', [AdminController::class, 'Index'])->name('member.home');
});









Route::get('/file', [FileUploadController::class, 'Index']);
Route::post('/file/store', [FileUploadController::class, 'Store'])->name('file.store');
Route::post('/file/remove', [FileUploadController::class, 'Remove'])->name('file.remove');
