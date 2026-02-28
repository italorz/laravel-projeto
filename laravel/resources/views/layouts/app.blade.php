<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Automóveis')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <a href="{{ route('automovel.index') }}" class="logo">Sistema Automóveis</a>
        </div>
    </header>

    <main class="main container">
        @include('layouts.alerts')
        @yield('content')
    </main>

    <footer class="site-footer">

    </footer>
</body>

</html>
