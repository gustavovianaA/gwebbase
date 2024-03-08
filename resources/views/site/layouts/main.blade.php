<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>GWeb Base</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description" content="GWeb Base. Uma base geral para websites gerenciáveis construída com Laravel 10.">
    <meta name="keywords" content="framework,laravel,sites gerenciáveis">
    <meta name="robots" content="">
    <meta name="revisit-after" content="1 day">
    <meta name="language" content="Portuguese">
    <meta name="generator" content="N/A">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- meta tags OG -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="https://www.gustavovianadev.com.br">
    <meta property="og:title" content="GWeb BAse">
    <meta property="og:site_name" content="GWeb Base - Sites Dinâmicos">
    <meta property="og:description" content="Uma base Laravel para sites dinâmicos">
    <meta property="og:image" content="{{ asset('img/socialShare.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Template Stylesheet -->
    <link href="{{ asset('css/site/style.css') }}" rel="stylesheet">
</head>

<body>

    @yield('content')

    <!-- JavaScript Libraries -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>