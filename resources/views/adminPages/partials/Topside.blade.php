<div class="bg-white shadow-md w-full h-14">
    <div class="flex flex-row-reverse items-center h-full ">
        <div class="mx-3">
            <div class="bg-gray-300 rounded-full w-8 h-8 mt-1">
                @if (Auth::user())
                    <img src="{{ 'img/profile/' }}{{ Auth::user()->profile }}" alt="" class="w-full h-full rounded-full">
                @endif
            </div>
        </div>
        <div class="mx-3">
            <i class="fa-regular fa-message"></i>
        </div>
        <div class="mx-3">
            <i class="fa-regular fa-bell"></i>  
        </div>
        <a href="/logoutUser">Logout</a>
    </div>
</div>