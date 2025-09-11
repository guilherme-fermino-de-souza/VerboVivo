<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <title>Administrador</title>
</head>
<body>

    @include('admin/layouts.navbar')

    @yield('content') <!---=-------------------Parte onde o conteúdo é inserido------------------------------------------------>

</body>
</html>