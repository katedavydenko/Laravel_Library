<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

<h1>Edit Book: {{ $book->title }}</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')

    <label>Title:</label><br>
    <input type="text" name="title" value="{{ old('title', $book->title) }}"><br><br>

    <label>Year:</label><br>
    <input type="number" name="year" value="{{ old('year', $book->year) }}"><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="{{ route('authors.show', $book->author_id) }}">← Back</a>

</body>
</html>
