<x-app-layout>
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight ">
            {{ __('Teacher Dashboard') }}
        </h2>

            {{-- cards --}}
           <div class="flex flex-wrap gap-4 items-center justify-center ">

               {{-- card --}}
             <div class="w-full p-4 card rounded-lg md:w-1/2">
                  <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform: ;msFilter:;"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg>
                </div>
                  <h2 class="text-lg font-semibold title-font mb-2">Subjects</h2>
                  <p class="leading-relaxed text-3xl font-bold">
                        {{ $subjects }}
                    </p>   
                </div>
       

               {{-- card --}}
             <!-- <div class="w-full p-4 card rounded-lg md:w-1/2">
                  <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform: ;msFilter:;"><path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"></path><path d="M8 6h9v2H8z"></path></svg>
                </div>
                  <h2 class="text-lg font-semibold title-font mb-2">Students</h2>
                  <p class="leading-relaxed text-3xl font-bold">
                      70
                    </p>   
                </div>-->

                {{-- end of cards --}}
                 <div id='calendar' class="pt-8"></div>
             </div> 

 

     

            <style>
                .card {
                    --tw-shadow:  0 10px 15px -5px rgba(14, 26, 187, 0.5), 0 10px 10px -5px rgba(25, 69, 212, 0.04);
                     box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                    position: relative;
                    }

                    @media (min-width: 1280px) {
                        .card {
                            width: 31.333333%;
                        }
                    }

                .card::before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #5F5EF8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(2):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #7158D8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(3):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #29C890;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
            </style>



</x-app-layout>
