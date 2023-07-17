<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data User</h1>
        </div>
        <div class="ml-3"> 
            <div class="mb-2 relative w-[100%]">
                <button onclick="modal('Tambah')" class="cursor-pointer shadow-md text-white bg-blue-400 px-8 py-1 mb-2 rounded-md btnTambahUser" id="btnTambahUser">
                    Tambah
                </button>
                {{-- @include('adminPages.partials.modalDataBarang') --}}
            </div>
            @include('adminPages.partials.modalDialogUser')
        </div>
    </div>
    <div class="content mt-5">
        <div class="w-full rounded-md shadow-md">
            <table class="w-full pr-8">
                <thead class=" bg-white">
                    <tr class="border text-center">
                        <th>ID User</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUser as $user)
                    <tr class="border text-center">
                        <td class="py-2 text-center">
                            <img src="{{ 'img/profile/' }}{{ $user->profile }} " class="w-10 mx-auto">
                        </td>
                        <td class="py-2">
                            {{ $user->idUser }}
                        </td>
                        <td class="py-2">
                            {{ $user->namaUser }}
                        </td>
                        <td class="py-2">
                            {{ $user->username }}
                        </td>
                        <td class="py-2">
                            {{ $user->status }}
                        </td>
                        <td class="py-2">
                            {{ $user->email }}
                        </td>
                        <td class="py-2">
                            {{ $user->created_at }}
                        </td>
                        <td class="py-2">
                            {{-- <button value="{{ $user->idUser }}" class="editDataUser" id="editDataUser" onclick="modal('Edit', '{{$user->idUser}}')">
                                Edit 2
                            </button> --}}
                            <button class="px-4 py-1 bg-green-400 editDataUser text-white font-semibold rounded-md shadow-md" onclick="modal('Edit', '{{$user->id}}')"
                            value="{{ $user->id }}" id="editDataUser">
                                Edit
                            </button>
                            <button class="px-4 py-1 bg-red-400 text-white font-semibold rounded-md shadow-md btnHapus" value="{{ $user->id }}" onclick="modal('Hapus', '{{ $user->id }}')">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>