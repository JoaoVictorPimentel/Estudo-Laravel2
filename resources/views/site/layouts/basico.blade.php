<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    @include('site.layouts._partials.header')

    @yield('conteudo')

    @include('site.layouts._partials.footer')
</body>

</html>