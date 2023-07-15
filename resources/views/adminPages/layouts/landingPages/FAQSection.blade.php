<div class="ml-[13%] mt-4 mx-3">
    <div class="border w-full h-screen mt-8 p-2" id="FAQ">
        <h1></h1>
        <div class="p-2 flex justify-around pt-5">
            <div class="">
                <img src="{{ 'img/imgFAQ.png' }}" alt="FAQ">
            </div >
            <div class="rounded-md shadow-md w-[50%] p-5 mt-6">
                <h1 class="text-center text-4xl text-blue-800 mb-5 font-serif">FAQ</h1>
                <div>
                    {{-- Question 1 --}}
                    <div class="relative overflow-hidden bg-white w-full shadow-md">
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
                        <div class="rounded-br-md rounded-bl-md text-slate-700 overflow-hidden bg-slate-100 transition-all duration-700 ease-in-out max-h-0 peer-checked:max-h-60">
                            <div class="p-5 border-t">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis alias error deserunt quisquam qui fuga iste, amet distinctio consequatur similique hic. Dignissimos culpa, dolorum minima nesciunt quae a sit veniam recusandae harum corporis distinctio debitis excepturi enim inventore porro error nisi ipsa, quidem eum? Delectus ullam cupiditate ipsa pariatur amet consectetur necessitatibus deleniti dicta, rerum modi accusamus ipsum nihil aperiam corrupti, eaque at corporis tempore aspernatur rem veritatis ipsam totam.</div>
                        </div>
                    </div>
                    {{-- End Question 1 --}}
                    {{-- Question 2 --}}
                    <div class="relative overflow-hidden bg-white w-full shadow-md mt-2">
                        <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer" />
                        <div class="h-12 w-full pl-5 flex items-center">
                            <h1>
                                Question 2
                            </h1>
                        </div>
                        <div class="absolute top-3 right-3 transition-transform duration-700 ease-in-out rotate-0 peer-checked:-rotate-90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="rounded-br-md rounded-bl-md text-slate-700 overflow-hidden bg-slate-100 transition-all duration-700 ease-in-out max-h-0 peer-checked:max-h-40">
                            <div class="p-5 border-t">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam earum aut quisquam, sit mollitia repellat blanditiis, dignissimos, ut dolorem officiis maiores quo tempora ipsa. Odio vero numquam tenetur voluptatibus doloribus, minima ut unde corrupti eos temporibus incidunt culpa aspernatur dolores odit dicta. Quas odio, provident amet minus rerum veritatis ipsum!</div>
                        </div>
                    </div>
                    {{-- End Question 2 --}}
                    {{-- Question 3 --}}
                    <div class="relative overflow-hidden bg-white mt-2 w-full shadow-md">
                        <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer" />
                        <div class="h-12 w-full pl-5 flex items-center">
                            <h1>
                                Question 3
                            </h1>
                        </div>
                        <div class="absolute top-3 right-3 transition-transform duration-700 ease-in-out rotate-0 peer-checked:-rotate-90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="rounded-br-md rounded-bl-md text-slate-700 overflow-hidden bg-slate-100 transition-all duration-700 ease-in-out max-h-0 peer-checked:max-h-40">
                            <div class="p-6 border-t">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit aspernatur ipsa quam, soluta error excepturi possimus! Numquam praesentium eligendi porro asperiores doloribus hic sit incidunt exercitationem maiores labore deserunt non, quod consectetur soluta.</div>
                        </div>
                    </div>
                    {{-- End Question 3 --}}
                </div>
                
            </div>
        </div>
    </div>

    {{-- Form Input Produk --}}
    <div class="bg-slate-100 rounded-md shadow-md w-full p-2 mt-3 mb-6">
        <form action="" method="post">
            <div class="flex"> 
                <div class="">
                    <h1>Background FAQ Section</h1>
                    <input type="color" name="bgFAQSection" id="bgFAQSection" class="border-2 border-slate-200 bg-white shadow-md">
                    <h1>Judul Question 1</h1>
                    <input type="text" name="judulQuestion1" id="judulQuestion1" class="border-2 border-slate-200 bg-white shadow-md">
                    <h1>Judul Question 2</h1>
                    <input type="text" name="judulQuestion2" id="judulQuestion2" class="border-2 border-slate-200 bg-white shadow-md">
                    <h1>Judul Question 3</h1>
                    <input type="text" name="judulQuestion3" id="judulQuestion3" class="border-2 border-slate-200 bg-white shadow-md">
                </div> 
                <div class="ml-5 grid grid-cols-2">
                    <div> 
                        <h1>Isi Question 1</h1>
                        <textarea name="judulQuestion1" id="judulQuestion1" class="p-2 border-2 border-slate-200 bg-white shadow-md" cols="30" rows="6"></textarea>
                    </div>
                    <div>
                        <h1>Isi Question 2</h1>
                        <textarea name="judulQuestion2" id="judulQuestion2" class="p-2 border-2 border-slate-200 bg-white shadow-md" cols="30" rows="6"></textarea>
                    </div>
                    <div class="ml-2">
                        <h1>Isi Question 3</h1>
                        <textarea name="judulQuestion3" id="judulQuestion3" class="p-2 border-2 border-slate-200 bg-white shadow-md" cols="30" rows="6"></textarea>
                    </div>
                </div>
                
            </div>
            <button class="py-1 px-6 bg-blue-800 text-white rounded-md shadow-md">Update</button>
        </form>
    </div>
    {{-- ENd Form Input Produk --}}

</div>
