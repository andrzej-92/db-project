<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bazy Danych 2 - Projekt | Andrzej Tracz</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <script type="text/javascript">
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>