<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Quora Cloned</title>
    @livewireStyles
</head>
<body>

    <div class="flex justify-evenly p-3 border shadow">
        <h4 class="text-2xl text-red-500">Quora</h4>
        <h6>Home</h6>
        <h6>Following</h6>
        <h6>Answer</h6>
        <h6>Notifications</h6>
        <h6>Search Bar</h6>
        <h6>User Avatar</h6>
        <h6 class="bg-red-500 p-2 text-white rounded-3xl">Add Question</h6>
    </div>


    @yield('content')


    @livewireScripts
</body>
</html>