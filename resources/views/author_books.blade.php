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

    @if($author->books->count() > 0)
        <ul>
            @foreach($author->books as $book)
                <li>{{ $book->title }} ({{ $book->year }})</li>
            @endforeach
        </ul>
    @else
        <p style="text-align: center;">No books available for this author.</p>
    @endif

    <div style="text-align: center;">
        <a href="{{ route('books') }}" class="back">← Back to all authors</a>
    </div>
</body>
</html>
