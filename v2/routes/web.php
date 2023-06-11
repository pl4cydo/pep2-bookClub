<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Return_;

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
    return Inertia::render('Welcome/Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('listBook', function(){
    return Inertia::render('ListBooks/Index.vue');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/category2', [CategoryController::class, 'index2'])->name('category2.index2');
    Route::resource('/category', CategoryController::class);

    Route::resource('/book', BookController::class);
    Route::get('book/bookView/{id}', [BookController::class, 'bookView'])->name('book.bookView');
    Route::get('book/search/{name}', [BookController::class, 'bookSearch'])->name('book.bookSearch');
    Route::get('listBooks', [BookController::class, 'listBooks'])->name('book.listBooks');

    Route::resource('/comments', CommentController::class);

    Route::resource('/message', MessageController::class);
    
    Route::resource('favorite', FavoriteController::class);
});




require __DIR__.'/auth.php';
