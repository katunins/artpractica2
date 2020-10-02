<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Аунтификация администратора</title>
    <link rel="stylesheet" href="{{ asset('css/adminpass.css') }}">
</head>
<body>
    <div class="content">
        <div class="logo">
            <img src="images/sec_vers/logo.png" alt="">
        </div>
        <form action="{{ route('checkAdminPass') }}" role="form" method="post">
            @csrf
            <h3>Введите пароль администратора</h3>
            <div class="form-block">
                
                @error ('password')
                <div class="error">
                    {{ $message }}
                </div>
                @enderror
                <input type="password" name="password" placeholder="Введите пароль">
            </div>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>