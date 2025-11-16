<!DOCTYPE html>
<html>
<head>
    <title>Add Author</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 2em; }
        form { background: #fff; padding: 2em; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 400px; margin: 0 auto; }
        label { display: block; margin-bottom: 0.5em; }
        input { width: 100%; padding: 0.5em; margin-bottom: 1em; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #3490dc; color: white; padding: 0.75em 1.5em; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #2779bd; }
        .error { color: red; margin-bottom: 1em; }
    </style>
</head>
<body>

<h1>Add New Author</h1>

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('authors.store') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name">
    <button type="submit">Save Author</button>
</form>
<a href="{{ route('authors') }}">← Back to catalog</a>

</body>
</html>
