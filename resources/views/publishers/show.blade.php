<!DOCTYPE html>
<html>
<head>
    <title>{{ $publisher->name }} - Books</title>
</head>
<body>
    <h1>{{ $publisher->name }} - Books</h1>

    @if($publisher->books->count())
        <ul>
            @foreach($publisher->books as $book)
                <li>
                    {{ $book->title }} ({{ $book->year ?? 'N/A' }})
                    by {{ $book->author->name }}
                    — Genres: {{ $book->genres->pluck('name')->join(', ') }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No books available.</p>
    @endif

    <a href="{{ route('guest') }}">← Back to Catalog</a>
</body>
</html>
