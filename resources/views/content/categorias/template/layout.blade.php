<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/template/navbar.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/template/footer.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/content/categorias/style.css')}}">
    <title>V/Categorias</title>
</head>

<body>

    @include('templates/layouts.header')
    @include('templates/layouts.navbar')

    @yield('content') <!---=-------------------Parte onde o conteúdo é inserido------------------------------------------------>

    @include('templates/layouts.footer')

</body>

</html>