<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    $data=\App\Models\Book::all();
    return view('welcome' , ['data' =>$data]);
})->name('/');

Route::get('books/add/{book}',[\App\Http\Controllers\BookController::class,'addKala'])->name('books.add');
Route::get('books/new',[\App\Http\Controllers\BookController::class,'viewAdd'])->name('books.add');
Route::post('books/store', [\App\Http\Controllers\BookController::class,'store'])->name('books.store')->middleware(['auth', 'verified']);
Route::get('/admin/book',[\App\Http\Controllers\BookController::class,'adminAll']);
Route::get('/admin/book/{book}',[\App\Http\Controllers\BookController::class,'delete'])->name('admin.book');
Route::get('/admin/user',[\App\Http\Controllers\UserController::class,'all']);
Route::get('/admin/user/{user}',[\App\Http\Controllers\UserController::class,'del'])->name('admin.user');
Route::get('/admin/sale/{sale}',[\App\Http\Controllers\SaleController::class, 'all'])->name('admin.sale');
Route::get('/admin/sale',[\App\Http\Controllers\SaleController::class,'all']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
