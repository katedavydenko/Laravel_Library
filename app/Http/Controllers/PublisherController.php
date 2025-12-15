<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function show(Publisher $publisher)
    {
        $publisher->load('books.author', 'books.genres');
        return view('publishers.show', compact('publisher'));
    }
}
