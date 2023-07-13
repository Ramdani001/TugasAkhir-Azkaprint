<div class="grid grid-cols-6 gap-10 px-10">
    <?php for($i = 0; $i < 15; $i++){ ?>
        <div class="bg-white w-40 h-64 rounded-md shadow-md">
            <div class="bg-blue-400 w-full h-36">
                img
            </div>
            <div class="text-center mt-1 m-2">
                <h1 class="font-semibold mb-1">
                    {{ $name }}
                </h1>
                <h6 class="italic">
                    {{ $price }}
                </h6>
                <button class="bg-blue-500 px-4 text-center mt-3 text-white rounded-md shadow-md">Detail</button>
            </div>
        </div>
    <?php } ?>
</div>