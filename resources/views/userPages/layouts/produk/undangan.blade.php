<div class="grid grid-cols-6 gap-10 px-10">
    @foreach ($dataUndangan as $undangan)
        <div class="bg-white w-40 h-64 rounded-md shadow-md">
            <div class="bg-blue-400 w-full h-36">
                <img src="{{ 'img/produk/' }}{{ $undangan->fotoProduk }}" alt="" class="h-full w-full">
            </div> 
            <div class="text-center mt-1 m-2">
                <h1 class="font-semibold mb-1">
                    {{ $undangan->namaProduk }} 
                </h1>
                <h6 class="italic">
                    <?php $harga = $undangan->hargaProduk;
                        echo "Rp. ". number_format($harga, 0, ".", ".");
                    ?>
                </h6>
                <button class="bg-blue-500 px-4 text-center mt-3 text-white rounded-md shadow-md">Detail</button>
            </div>
        </div>

    @endforeach
</div> 