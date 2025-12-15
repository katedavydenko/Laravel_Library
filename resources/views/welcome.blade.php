<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the Library</title>
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
        }

        .card h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        .card p {
            margin-bottom: 2rem;
            color: #555;
        }

        .btn {
            background-color: #3490dc;
            color: white;
            padding: 10px 15px;
            border-radius: 0.5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btns {
            display: flex;
            gap: 20px;
            flex-direction: column;

        }
        .top-btns {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Welcome to the Library Catalog</h1>
        <p>Explore authors and their books. Please log in to access the catalog.</p>
        <div class= "btns" >
            <div class = "top-btns">
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('catalog') }}" class="btn">Go to Catalog</a>
            </div>
            <div class = "logout-btn">
                <form  method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button  class ="btn" type="submit" >Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
