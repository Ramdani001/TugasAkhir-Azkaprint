<div class="w-full h-full bg-blue-500 text-center p-16">
    <div class="w-full h-full py-1">
        <div class="w-full h-full">
            <h1 class="text-2xl font-bold font-sans text-white">Register</h1>
            <div class="mt-5">
            <form action="/authRegist" method="post" enctype="multipart/form-data" id="formRegister">
                @csrf
                <div class="flex text-left">
                    <span  class="text-white" >Foto Profile
                        <input type="file" id="profile" name="profile" required>
                    </span>
                </div>

                <input type="text" placeholder="Id User" id="idUser" name="idUser" 
                    class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required readonly>
                
                <input type="text" placeholder="Nama Lengkap" id="namaUser" name="namaUser" class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required>

                <input type="text" placeholder="Username" id="username" name="username" class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required>

                <input type="text" placeholder="Email Address" id="email" name="email" class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required>

                <input type="text" value="Users" placeholder="Email Address" id="status" name="status" class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required hidden>

                <input type="text" placeholder="Password" id="password" name="password" class=" border border-slate-200 w-full py-2 px-2 text-md rounded-xl my-2 text-slate-600" required>

                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-500 px-8 py-2 text-center font-semibold text-md w-full mt-3 rounded-md shadow-md text-white ">Submit</button>
                {{-- btnRegister" id="btnRegister" value="Register" --}}
            </form>
        </div>
    </div>
</div>