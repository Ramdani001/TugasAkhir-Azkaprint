{{-- Modal Tambah User --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModal">

</button>

<div id="modalTambahUser" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Tambah Data User Admin</h1>
            <hr>
            <div class="mt-3"> 
                <form >
                    @csrf
                    <input type="text" id="idUser" name="idUser" placeholder="Id User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="profile" name="profile" placeholder="Profile" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">
                    
                    <input type="text" id="namaUser" name="namaUser" placeholder="Nama User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="username" name="username" placeholder="Username" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="password" name="password" placeholder="Password" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Password" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="status" name="status" placeholder="Status" value="Admin" class="border-2 my-2 rounded-sm shadow-md bg-slate-300 w-full px-3 py-1" readonly>

                    <input type="text" id="email" name="email" placeholder="Alamat Email" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modal('Close')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalUser" id="btnBatalUser">Batal</button>
                        <button type="button" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md tmbhUser" value="dataUserSection" >Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah User --}}

{{-- Modal Edit User --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalEdit">

</button>

<div id="modalEditUser" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Edit Data User Admin</h1>
            <hr>
            <div class="mt-3">
                <form action="/updateDataUser" method="POST" enctype="multipart/form-data">
                    
                    @csrf 
                    @method('PUT')

                    <input type="text" id="idModalUser" name="idModalUser" placeholder="Id User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="profileUserModal" name="profileUserModal" placeholder="Profile User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="idUserModal" name="idUserModal" placeholder="Id User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaUserModal" name="namaUserModal" placeholder="Nama User" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">
                    
                    <input type="text" id="usernameModal" name="usernameModal" placeholder="Username" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="passwordUserModal" name="passwordUserModal" placeholder="passwordUserModal" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">


                    <input type="text" id="statusModal" name="status" placeholder="Status" value="Admin" class="border-2 my-2 rounded-sm shadow-md bg-slate-300 w-full px-3 py-1" readonly>

                    <input type="text" id="emailModal" name="emailModal" placeholder="Alamat Email" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modal('CloseEdit')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalUser" id="btnBatalUser">Batal</button>
                        <button type="submit" class="btnEdituser py-1 w-full bg-blue-800 rounded-md text-white shadow-md" value="dataUserSection">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit User --}}

{{-- Modal Hapus User --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalHapus">

</button>

<div id="modalHapusUser" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Hapus Data User Admin</h1>
            <hr>
            <div class="mt-3">
                <div>
                    <h1>Apakah Anda Yakin Akan Menghapus Data...??? 
                        <input type="text" name="idUser" id="idUser1">
                    </h1>
                </div>
                <div class="flex w-full mt-3">
                    <button type="button" onclick="modal('CloseHapus')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalUser" id="btnBatalUser">Tidak</button>
                    <button type="button" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Hapus User --}}