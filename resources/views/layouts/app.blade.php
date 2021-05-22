<!doctype html>
<html lang="ru">
<head>
    @include('layouts.app.head')
</head>
<body class="d-flex flex-column h-100" style="background: #E9ECEF">
@include('layouts.app.header')
@yield('content')
</body>
<!-- ФУТЕР -->
<footer class="footer mt-auto py-3 bg-dark">
    <div class="row justify-content-md-center">
        <div class="col-md-2">
            <span class="text-muted">e-mail: sale_book@mail.ru</span>
        </div>
        <div class="col-md-2">
            <span class="text-muted">Телефон: 8800553535</span>
        </div>
        <div class="col-md-2">
            <span class="text-muted">Адрес: г.Иркутск ул. Курчатова 8а, 320</span>
        </div>
        <div class="col-md-2">
            <span class="text-muted">Все права защищены© 2021</span>
        </div>
    </div>
</footer>
@include('layouts.app.modal')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="{{ asset('js/jquery-min.js') }}"></script>
<script src="{{ asset('js/jquery-cookie.js') }}"></script>
<script src="{{ asset('js/orderInf.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>
