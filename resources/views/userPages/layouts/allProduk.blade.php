@extends('userPages/main')

@section('content')
    <div class="h-full w-full px-2 pt-10">
        <div class="w-full h-full rounded-md mt-10 shadow-lg p-3">
            <div class=" w-full h-full rounded-md shadow-md p-2 ">
                <div class="flex justify-around mb-8 bg-blue-400/30 items-center">
                    <div class="cursor-pointer spa-route" value="stempel">
                        Stempel
                    </div>
                    <div class="cursor-pointer spa-route" value="undangan">
                        Undangan
                    </div>
                    <div>
                        <div id="dropdown" class="dropdown inline-block relative">
                          <button onclick="dropdown()" class="py-2 px-4 rounded inline-flex items-center">
                            <span class="mr-1">Spanduk</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                          </button>
                          <ul id="dropdown-menu" class="dropdown-menu absolute hidden text-white bg-blue-400 pt-1 rounded-tl-xl rounded-br-xl">
                            <li onclick="dropdown()" class="py-2 px-4 block whitespace-no-wrap hover:bg-slate-100/30 cursor-pointer spa-route" value="banner">
                                Banner
                            </li>
                            <li onclick="dropdown()" class="py-2 px-4 block whitespace-no-wrap hover:bg-slate-100/30 cursor-pointer spa-route" value="xbanner">
                                X-Banner
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="cursor-pointer spa-route " value="lanyard">
                        Lanyard
                    </div>
                    <div class="cursor-pointer spa-route" value="idCard">
                        Id Card
                    </div>
                </div>

                {{-- Menampilkan Data --}}
                <div id="contentProduk">

                </div>
                
            </div>
        </div>
    </div>

    <script>
       function dropdown(){
        $dropdown = document.getElementById("dropdown-menu");
        $dropdown.classList.toggle("hidden");
       }
    </script>

@endsection