<!DOCTYPE html>
<html>
<head>
    <title>Authors and Books</title>
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
            font-size: 2rem;
        }

        .logout-form {
            text-align: center;
            margin-bottom: 2em;
        }

        .logout-btn {
            background-color: #e3342f;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #cc1f1a;
        }

        .author {
            background: #fff;
            padding: 1em 1.5em;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 1em;
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
        }

        .author:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .author strong {
            font-size: 1.2rem;
            color: #34495e;
        }

        .books {
            list-style-type: disc;
            margin-top: 0.5em;
            margin-left: 1.5em;
            padding-left: 0;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.4s ease;
        }

        .author:hover .books {
            max-height: 500px; /* enough to show all books */
            opacity: 1;
        }

        .books li {
            padding: 0.2em 0;
            font-size: 1rem;
            color: #555;
        }

        .books li::before {
            content: "📖 ";
        }

        .books p {
            margin: 0;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

    {{-- Logout button --}}
    <div class="logout-form">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <h1>Library Catalog</h1>
<!--
    @foreach($authors as $author)
        <div class="author">
            <strong>{{ $author->name }}</strong>

            @if($author->books->count() > 0)
                <!--<ul class="books">
                    @foreach($author->books as $book)
                        <li>{{ $book->title }} ({{ $book->year }})</li>
                    @endforeach
                </ul>
            @else
                <ul class="books">
                    <p>No books available</p>
                </ul>
            @endif
        </div>
    @endforeach -->
    @foreach($authors as $author)
    <div class="author">
        <a href="{{ route('authors.show', $author->id) }}" style="text-decoration: none; color: inherit;">
            <strong>{{ $author->name }}</strong>
        </a>
    </div>
@endforeach
 <div class="create-author">
        <a href="{{ route('authors.create') }}" class="btn">+ Add Author</a>
    </div>
</body>
</html>
