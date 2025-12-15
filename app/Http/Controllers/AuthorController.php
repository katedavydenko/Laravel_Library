<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;  
use App\Models\Genre;  
use App\Models\Publisher;

class AuthorController extends Controller
{
       


    public function index()
    {
        $authors = Author::with('books')->get();
        return view('authors', compact('authors'));
    }
    public function show($id)
    {
    $author = Author::with('books')->findOrFail($id);
    return view('books', compact('author'));
    }
    public function create()
    {
        return view('authors.create');
    }

    // Store new author
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($validated);

        return redirect()->route('authors')->with('success', 'Author added successfully!');
    }
}
