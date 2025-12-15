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
            width: fit-content;
            
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

        form.filter-form {
            text-align: center;
            margin-bottom: 2em;
        }

        form.filter-form select {
            padding: 0.3em 0.5em;
            margin-left: 0.5em;
            margin-right: 0.5em;
        }

        form.filter-form button {
            padding: 0.3em 0.8em;
            background: #3490dc;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        form.filter-form button:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>

  <div class="logout-form">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <h1>Library Catalog</h1>
<a href="{{ route('login') }}" class="login-btn">Login to manage catalog</a>
    {{-- Genre Filter --}}
    <form method="GET" action="{{ route('guest') }}" class="filter-form">
        <label for="genre">Filter by Genre:</label>
        <select name="genre_id" id="genre">
            <option value="">-- All Genres --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>
  @if(isset($publishers) && $publishers->count())
    <form>
        <label for="publisher">View by Publisher:</label>
        <select id="publisher" onchange="if(this.value) { window.location.href=this.value }">
            <option value="">-- Select Publisher --</option>
            @foreach($publishers as $publisher)
                <option value="{{ route('publishers.show', $publisher->id) }}">
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select>
    </form>
@endif
    {{-- Authors and Books --}}
    @foreach($authors as $author)
        <div class="author">
            <strong>{{ $author->name }}</strong>

            @if($author->books->count() > 0)
                <ul class="books">
                    @foreach($author->books as $book)
                        <li>{{ $book->title }} ({{ $book->year ?? 'N/A' }})</li>
                    @endforeach
                </ul>
            @else
                <p>No books available</p>
            @endif
        </div>
    @endforeach

</body>
</html>
