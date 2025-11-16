<!DOCTYPE html>
<html>
<head>
    <title>Add Book for {{ $author->name }}</title>
</head>
<body>
    <h1>Add Book for {{ $author->name }}</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('books.store', $author->id) }}">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Year:</label>
        <input type="number" name="year" value="{{ old('year') }}"><br><br>

        <button type="submit">Add Book</button>
    </form>

    <br>
    <a href="{{ route('authors.show', $author->id) }}">← Back to Author's Books</a>
</body>
</html>
