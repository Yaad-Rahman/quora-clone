<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Quora Cloned</title>
    @livewireStyles
</head>
<body>

    <div class="flex justify-evenly border shadow py-5">
        <h4 class="text-2xl text-red-500">Quora</h4>
        <a href="{{route('home')}}">Home</a>
        <h6>Following</h6>
        <h6>Answer</h6>
        <h6>Notifications</h6>
        @livewire('search')
        <a href="{{route('profile', auth()->user()->id)}}">
            <img class="rounded-3xl w-8 ring-1 ring-black h-8" src="{{asset('/user.jpg')}}" alt="" height="50">
        </a>
        
        <h6 class="bg-red-500 p-1 text-white rounded-3xl">Add Question</h6>
    </div>


    @yield('content')


    @livewireScripts
</body>
</html>