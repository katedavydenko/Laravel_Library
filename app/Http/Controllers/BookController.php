<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
     public function create(Author $author)
    {
        return view('books.create', compact('author'));
    }

    public function store(Request $request, Author $author)
    {
        // Validate incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:'.date('Y'),
        ]);

        // Create book for this author
        $author->books()->create($validated);

        return redirect()
            ->route('authors.show', $author->id)
            ->with('success', 'Book added successfully!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('authors.show', $book->author_id)
            ->with('success', 'Book deleted successfully!');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:'.date('Y'),
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()
            ->route('authors.show', $book->author_id)
            ->with('success', 'Book updated successfully!');
    }
}
