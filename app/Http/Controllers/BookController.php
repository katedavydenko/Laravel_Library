<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

class BookController extends Controller
{
    public function index(Request $request)
    {
    $authors = Author::with('books.genres')->get();

    $genres = Genre::all();

    if ($request->has('genre_id') && $request->genre_id) {
        $genreId = $request->genre_id;
        $authors->each(function ($author) use ($genreId) {
            $author->books = $author->books->filter(function ($book) use ($genreId) {
                return $book->genres->pluck('id')->contains($genreId);
            });
        });
    }

    return view('books.index', compact('authors', 'genres'));
    }
     public function create(Author $author)
    { $genres = Genre::all();
         $publishers = Publisher::all();

        return view('books.create', compact('author', 'genres', 'publishers'));
    }

    public function store(Request $request, Author $author)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'nullable|integer|min:1500|max:' . date('Y'),
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book = Book::create([
            'title' => $validated['title'],
            'year' => $validated['year'] ?? null,
            'author_id' => $author->id,
            'publisher_id' => $validated['publisher_id'], 
        ]);

        $book->genres()->sync($validated['genres'] ?? []);

        return redirect()
            ->route('authors.show', $author->id)
            ->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
        {
            $genres = Genre::all();
            $publishers = Publisher::all(); 

        return view('books.edit', compact('book', 'genres', 'publishers'));
        }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('authors.show', $book->author_id)
            ->with('success', 'Book deleted successfully!');
    }
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'nullable|integer|min:1500|max:' . date('Y'),
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book->update([
            'title' => $validated['title'],
            'year'  => $validated['year'] ?? null,
            'publisher_id' => $validated['publisher_id'], 
        ]);

        $book->genres()->sync($validated['genres'] ?? []);

        return redirect()
            ->route('authors.show', $book->author_id)
            ->with('success', 'Book updated successfully!');
    }
    public function guest()
    {
    $authors = Author::with('books.genres')->get();
    $genres = Genre::all();
    

    return view('guest', compact('authors', 'genres'));
    }
}
