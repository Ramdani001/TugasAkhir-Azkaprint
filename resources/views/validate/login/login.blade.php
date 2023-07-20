<div class="w-full h-full bg-blue-500 p-16">
    <div class="w-full h-full py-10">
        <div class="w-full h-full">
            <h1 class="text-2xl font-bold  text-center font-sans text-white">WELCOME</h1>
            <div class="mt-5">
            <form action="/authLogin" method="post">
                @csrf

                <div class="text-left">
                    @error('username')
                        <label class="text-md text-left text-red-500 font-semibold">
                            {{ $message }}
                        </label>
                    @enderror

                    <input type="text" placeholder="Username" class=" border border-slate-200 w-full py-3 px-2 text-md rounded-xl my-2 text-slate-600" id="email" name="username" required>
                    
                </div>

                <input type="text" placeholder="Password" class=" border border-slate-200 w-full py-3 px-2 text-md rounded-xl my-2 text-slate-600" id="password" name="password" required>

                <div class="flex flex-col-reverse text-sm text-slate-200 gap-10 mt-2">
                    
                    <div class="">
                        <h4>
                            <a class="hover:text-yellow-200 cursor-pointer">Lupa Password?</a>
                        </h4>
                    </div>
                </div>

            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-500 px-8 py-2 text-center font-semibold text-md w-full mt-3 rounded-md shadow-md text-white">Login</button>
            </form>
        </div>
    </div>
</div>