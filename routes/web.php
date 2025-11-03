<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Models\Author;
use App\Http\Controllers\ProfileController;
//Route::get('/books', function () {
  //  $authors = Author::with('books')->get();
    //return view('books', compact('authors'));
//});


//Route::get('/books', function () {
  //   $authors = Author::with('books')->get();
    //return view('books', compact('authors'));

//})->middleware(['auth', 'verified'])->name('books');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authenticated routes
Route::middleware('auth')->group(function () {
    
    Route::get('/books', [AuthorController::class, 'index'])->name('books');
    Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
