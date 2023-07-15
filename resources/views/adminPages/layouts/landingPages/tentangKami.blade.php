<div class="ml-[13%] mt-4 mx-3">
    <div class="p-3" id="tentangKami">
        <div class=" w-full bg-white rounded-md shadow-lg pt-14 shadow-yellow-400/50">
            <h1 class="text-xl font-semibold font-sans text-center">TENTANG KAMI</h1>
           <div class="h-80 w-full flex justify-center relative pt-10">
            <div class="w-full m-2">
                <div class="relative overflow-hidden bg-slate-100">
                    <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer" />
                    <div class="h-12 w-full pl-5 flex items-center">
                        <h1>
                            Question 1
                        </h1>
                    </div>
                    <div class="absolute top-3 right-3 transition-transform duration-700 ease-in-out rotate-0 peer-checked:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <div class="overflow-hidden bg-white transition-all duration-700 ease-in-out max-h-0 peer-checked:max-h-40">
                        <div class="p-5 border-t">Answer 1</div>
                    </div>
                </div>
                <div class="relative overflow-hidden bg-slate-100 mt-3">
                    <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer" />
                    <div class="h-12 w-full pl-5 flex items-center">
                        <h1>
                            Question 1
                        </h1>
                    </div>
                    <div class="absolute top-3 right-3 transition-transform duration-700 ease-in-out rotate-0 peer-checked:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <div class="overflow-hidden bg-white transition-all duration-700 ease-in-out max-h-0 peer-checked:max-h-40">
                        <div class="p-5 border-t">Answer 1</div>
                    </div>
                </div>
            </div>
            
                <div class="w-full m-2 mx-auto p-4">
                    <div class="flex justify-center h-full">
                       <div class="swiper mySwiper">
                           <div class="swiper-wrapper">
                             <div class="swiper-slide"></div>
                             <div class="swiper-slide">Slide 2</div>
                             <div class="swiper-slide">Slide 3</div>
                             <div class="swiper-slide">Slide 4</div>
                             <div class="swiper-slide">Slide 5</div>
                             <div class="swiper-slide">Slide 6</div>
                             <div class="swiper-slide">Slide 7</div>
                             <div class="swiper-slide">Slide 8</div>
                             <div class="swiper-slide">Slide 9</div>
                           </div>
                         </div>
                    </div>
                </div>
           </div>
         </div>
    </div>
    {{-- Form Input Nvbar --}}
    <div class="bg-slate-100 rounded-md shadow-md w-full p-2 mt-3 mb-6">
        <form action="" method="post"> 
            <div class="flex justify-around"> 
                <div class="grid grid-cols-2">
                    <div class="">
                        <h1>Judul Section</h1>
                        <input type="text" name="judulSection" id="judulSection" class="border-2 border-slate-200 bg-white shadow-md">
                        <h1>List 1</h1>
                        <h6>Judul List</h6>
                        <input type="text" name="list1" id="list1" class="border-2 border-slate-200 bg-white shadow-md">
                        <h6>Text List</h6>
                        <input type="text" name="list1" id="list1" class="border-2 border-slate-200 bg-white shadow-md">
                    </div>
                    <div class="">
                        <div class="">
.
                        </div>
                        <input type="text" name="judulSection" id="judulSection" class="border-2 border-slate-200 bg-white shadow-md">
                        <h1>List 2</h1>
                        <h6>Judul List 2</h6>
                        <input type="text" name="list1" id="list1" class="border-2 border-slate-200 bg-white shadow-md">
                        <h6>Text List 2</h6>
                        <input type="text" name="list1" id="list1" class="border-2 border-slate-200 bg-white shadow-md">
                    </div>
                </div>
                <div class="">
                    <h1>Background Tentang Kami Section</h1>
                    <input type="file" name="bgHeroSection" id="bgHeroSection" class="border-2 border-slate-200 bg-white shadow-md">
                </div>
                
            </div>
            <button class="py-1 px-6 bg-blue-800 text-white rounded-md shadow-md">Update</button>
        </form>
    </div>
    {{-- ENd Form Input Nvbar --}}
</div>
 