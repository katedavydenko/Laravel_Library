<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;  

class AuthorController extends Controller
{
    public function guestView()
    {
        $authors = Author::with('books')->get();
        return view('authors.guest', compact('authors'));
    }
    
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
