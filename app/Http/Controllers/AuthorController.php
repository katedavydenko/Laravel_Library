<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;  

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('books', compact('authors'));
    }
    public function show($id)
    {
    $author = Author::with('books')->findOrFail($id);
    return view('author_books', compact('author'));
    }
}
