<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Quora Cloned</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.0/dist/alpine.min.js"></script>
    @livewireStyles
</head>
<body>

    @include('components._topNavbar')

    @yield('content')


    @livewireScripts
</body>
</html>