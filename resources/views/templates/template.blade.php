<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prova PHP Dev Júnior</title>
    <script src="https://kit.fontawesome.com/e5e1c309e2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/style.css') }}">
</head>
<body>
    @yield('content')

    <script src="{{ url('assets/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/bootstrap/js/script.js') }}"></script>
</body>
</html>
