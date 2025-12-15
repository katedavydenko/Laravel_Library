<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

use App\Models\Publisher;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\GuestController;

//Route::get('/books', function () {
  //  $authors = Author::with('books')->get();
    //return view('books', compact('authors'));
//});


//Route::get('/books', function () {
  //   $authors = Author::with('books')->get();
    //return view('books', compact('authors'));

//})->middleware(['auth', 'verified'])->name('books');


//Route::get('/', function () {
   // return view('welcome');
//})->name('welcome');
Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::get('/publishers/{publisher}', [PublisherController::class, 'show'])->name('publishers.show');

// Authenticated routes
Route::middleware('auth')->group(function () {
    
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/authors/{author}/books/create', [BookController::class, 'create'])->name('books.create');
    
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::post('/authors/{author}/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    
    
    
});

require __DIR__.'/auth.php';
