<!DOCTYPE html>
<html>
<head>
    <title>{{ $author->name }}'s Books</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding: 2em;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 2em;
        }

        ul {
            background: #fff;
            padding: 1em 1.5em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 60%;
            margin: 0 auto;
        }

        li {
            padding: 0.5em 0;
            border-bottom: 1px solid #ddd;
        }

        li:last-child {
            border-bottom: none;
        }

        a.back {
            display: inline-block;
            margin-top: 2em;
            text-decoration: none;
            color: #3490dc;
            font-weight: bold;
        }

        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Books by {{ $author->name }}</h1>
    <div style="text-align: center;">
        <a href="{{ route('authors') }}" class="back">← Back to all authors</a>
    </div>

    @if($author->books->count() > 0)
        <ul>
    @foreach($author->books as $book)
        <li>
            {{ $book->title }} ({{ $book->year }})  - {{ $book->genres->count() ? $book->genres->pluck('name')->join(', ') : 'No genre' }}
            <a href="{{ route('books.edit', $book->id) }}"
               style="margin-left: 10px; color: #3490dc; font-weight: bold;">
               ✏️ Edit
            </a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this book?');">
                    Delete
                </button>
            </form>
            
        </li>
        
    @endforeach
</ul>
<a href="{{ route('books.create', $author->id) }}" class = "btn">+ Add New Book</a>
    @else
        <a href="{{ route('books.create', $author->id) }}">+ Add New Book</a>
    @endif

</body>
</html>
