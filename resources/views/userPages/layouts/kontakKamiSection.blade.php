<div class="w-full h-screen mb-5 shadow-lg border-t  border-slate-400 flex" id="kontakKami">
    <div class="bg-blue-800 w-full h-screen p-16">
        <h1 class="text-4xl text-white pb-2">KONTAK KAMI</h1>
        <div class="bg-yellow-400 w-16 h-1 mt-3">
        </div>

        {{-- Form Message Email --}}
        <div class="mt-10">
            <form action="/kirimEmail" method="POST">
                @csrf
                <div class="">
                    <input name="namaLengkap" type="text" class="w-[70%] mt-2 rounded-md shadow-md p-2" placeholder="Enter Your Name">
                    <input name="pengirim" type="text" class="w-[70%] mt-2 rounded-md shadow-md p-2" placeholder="Enter Your Email Address">
                    <textarea name="pesanEmail" id="" cols="30" rows="10" class="mt-2 rounded-md shadow-md p-2 w-[70%]" placeholder="Enter Your Message"></textarea>
                </div>
                <button type="submit" class="bg-yellow-400 py-1 px-8 text-white mt-2 shadow-md">Kirim</button>
            </form>
        </div>

    </div>
    <div class="bg-slate-200 w-full h-screen p-9 flex">
        <div class="bg-white w-80 h-full relative md:-ml-44 rounded-sm p-5 grid grid-rows-5 shadow-md">
            <div>
                <h1 class="text-xl font-semibold">Alamat</h1>
                <p class="pt-3 italic text-slate-500 mb-3">
                    Jl.Babakan Jati Gg.Jati Mulya V No.17 Rt 06/Rw 07
                </p>
            </div>
            <div>
                <h1 class="text-xl font-semibold">Telepon Kami</h1>
                <p class="pt-3 italic text-slate-500 mb-3 grid">
                    <span>+62 8572 3434 544</span>
                    <span>+62 8572 3434 544</span>
                </p>
            </div>
            <div>
                <h1 class="text-xl font-semibold">Jam Kerja</h1>
                <p class="pt-3 italic text-slate-500 mb-3 grid">
                    <span><b>Senin : </b> 08:00 - 19:00 </span>
                    <span><b>Selasa : </b> 08:00 - 19:00 </span>
                    <span><b>Rabu : </b> 08:00 - 19:00 </span>
                    <span><b>Kamis : </b> 08:00 - 19:00 </span>
                    <span><b>Jum'at : </b> 08:00 - 15:00 </span>
                    <span><b>Sabtu : </b> 08:00 - 12:00 </span>
                    <span><b>Minggu : </b> <span class="text-red-400">Libur</span> </span>
                    <span><b>Noted : </b> <br> Tanggal Merah <span class="text-red-400">Libur</span> </span>
                    
                </p>
            </div>
        </div>
        <div class="bg-blue-400 w-[380px] h-[554px] relative rounded-tr-sm rounded-br-sm shadow-md">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="380" height="554px" id="gmap_canvas" src="https://maps.google.com/maps?q=azkaprint gumuruh&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <style>.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:380px;}</style></div></div>
        </div>
    </div>
</div>