<!DOCTYPE html>
<html>
<head>
    <title>Library Catalog</title>
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

        .author {
            background: #fff;
            padding: 1em 1.5em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 1em;
        }

        .author strong {
            font-size: 1.2rem;
            color: #34495e;
        }

        .books {
            margin-top: 0.5em;
            margin-left: 1.5em;
        }

        .books li {
            list-style-type: disc;
            padding: 0.2em 0;
            color: #555;
        }

        .books li::before {
            content: "📖 ";
        }

        a.login-btn {
            display: block;
            text-align: center;
            margin-top: 2em;
            text-decoration: none;
            color: white;
            background: #3490dc;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: bold;
        }

        a.login-btn:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>

    <h1>Library Catalog</h1>

    @foreach($authors as $author)
        <div class="author">
            <strong>{{ $author->name }}</strong>
            @if($author->books->count() > 0)
                <ul class="books">
                    @foreach($author->books as $book)
                        <li>{{ $book->title }} ({{ $book->year }})</li>
                    @endforeach
                </ul>
            @else
                <p>No books available</p>
            @endif
        </div>
    @endforeach

    <a href="{{ route('login') }}" class="login-btn">Login to manage catalog</a>

</body>
</html>
