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
    <label>Genre:</label>
     <div class="genres">
      <select name="genres[]" multiple>
    @foreach($genres as $genre)
        <option value="{{ $genre->id }}" 
            {{ in_array($genre->id, $book->genres->pluck('id')->toArray() ?? []) ? 'selected' : '' }}>
            {{ $genre->name }}
        </option>
    @endforeach
    </select>
    <label>Publisher:</label><br>
<div class="publisher">
    <select name="publisher_id" required>
        <option value="">-- Select Publisher --</option>
        @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}" 
                {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                {{ $publisher->name }}
            </option>
        @endforeach
    </select>
</div>
<br>
    </div>

    <button type="submit">Save</button>
</form>

<br>
<a href="{{ route('authors.show', $book->author_id) }}">← Back</a>

</body>
</html>
