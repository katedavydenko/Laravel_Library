<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $publishers = Publisher::all();
        $authors = Author::with('books.genres', 'books.publisher')->get();

        if ($request->genre_id) {
            $genreId = $request->genre_id;

            // Filter books for each author
            $authors->each(function ($author) use ($genreId) {
                $author->books = $author->books->filter(function ($book) use ($genreId) {
                    return $book->genres->pluck('id')->contains($genreId);
                });
            });

            // Remove authors who now have no books
            $authors = $authors->filter(function ($author) {
                return $author->books->count() > 0;
            });
        }

        return view('guest', compact('authors', 'genres', 'publishers'));
    }

}
