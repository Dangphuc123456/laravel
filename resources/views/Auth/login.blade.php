<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
</head>

<body>
    <div class="container">
        <h1>Đăng nhập</h1>
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', '') }}" required autofocus autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required autocomplete="off">
            </div>
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="link-to-register">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>

</body>

</html>