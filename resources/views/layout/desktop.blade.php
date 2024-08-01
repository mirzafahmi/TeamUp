<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @livewireStyles
    @livewireScripts

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/25d6682bc0.js" crossorigin="anonymous"></script>
    
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
<body class="">
    @include('partial.navbar')
    
    <div class="container py-4">
        @include('partial.message')
        @yield('content')
    </div>
</body>
</html>