<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Авторизация</title>
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ url('/css/style_auth.css') }}" rel="stylesheet">
</head>
<body class="text-center">
<form class="auth" method="post" role="form" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    <label for="inputLogin" class="sr-only">Логин</label>
    <input type="login" id="inputLogin" class="form-control" placeholder="Логин" value="{{ old('login') }}" name="login" required autofocus>
    <label for="inputPassword" class="sr-only">Пароль</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="" name="password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
</form>
</body>
</html>