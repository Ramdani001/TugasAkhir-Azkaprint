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

                    <input type="text" placeholder="Username" class=" border border-slate-200 w-full py-3 px-2 text-md rounded-xl my-2 text-slate-600" id="email" name="email" required>
                    
                </div>

                <input type="text" placeholder="Password" class=" border border-slate-200 w-full py-3 px-2 text-md rounded-xl my-2 text-slate-600" id="password" name="password" required>

                <div class="flex flex-col-reverse text-sm text-slate-200 gap-10 mt-2">
                     
                    <div class="">
                        <h4>
                            <button type="button" class="hover:text-yellow-200 cursor-pointer" id="openModalBtn">Lupa Password?</button>
                        </h4>
                    </div>
                </div>

            </div> 
            <button type="submit" class="bg-green-600 hover:bg-green-500 px-8 py-2 text-center font-semibold text-md w-full mt-3 rounded-md shadow-md text-white">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal dialog -->
<div class="fixed inset-0 items-center justify-center z-40 hidden" id="modal">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="bg-white p-8 rounded shadow-lg z-50">
      <!-- Konten modal -->
      <h2 class="text-xl font-semibold mb-4">Disarankan Username/Email & Password dicatat :)</h2>
      <label for="" class="text-sm text-slate-500 mb-1">Masukan Email Yang Sudah Terdaftar</label>
      <form action="" method="post">
        <input type="text" name="emailLupaPassword" id="emailLupaPassword" placeholder="Email Address" class="border-2 border-slate-500 px-2 w-full py-1">
      </form>
      <!-- Tombol untuk menutup modal -->
      <div class="grid grid-cols-2 gap-3">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4" id="closeModalBtn">
            Batal
          </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" id="closeModalBtn">
            Submit
          </button>
      </div>
    </div>
  </div>

  <script>
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modal = document.getElementById("modal");
  
    // Fungsi untuk membuka modal
    function openModal() {
      modal.classList.remove("hidden");
      modal.classList.add("flex");
    }
  
    // Fungsi untuk menutup modal
    function closeModal() {
      modal.classList.add("hidden");
      modal.classList.remove("flex");

    }
  
    // Tambahkan event listener untuk membuka dan menutup modal
    openModalBtn.addEventListener("click", openModal);
    closeModalBtn.addEventListener("click", closeModal);
  </script>