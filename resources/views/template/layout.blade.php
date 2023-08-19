<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul')</title>
</head>
<body>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ Url('/about') }}">About</a>
    <a href="{{ Url('/product/samsung') }}">Product Samsung</a>
    <br><br>
    <h5>Ini adalah contoh tulisan H5</h5>

    <h2>@yield('judul')</h2>

    @yield('content')

    <p>Copyright @ 2023</p>
</body>
</html>
