<div x-data="{show: false}">
    <div @mouseover= "show = true" >
        <img  class="rounded-3xl w-8 ring-1 ring-black h-8" src="{{auth()->user()->avatar}}" alt="" height="50">
        <div x-show="show" class="absolute shadow-2xl bg-white mt-1">
            <ul @mouseout = "show = false" @click.away = "show = false">
                <li class="py-2 px-4 hover:bg-red-50 hover:text-red-700">
                    <a href="{{route('profile', auth()->user()->name)}}">Profile</a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                    @csrf
                    <button class="py-2 px-4 hover:bg-red-50 hover:text-red-700" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    
</div>