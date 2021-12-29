<div>

        <div  tabindex="0" class="focus:outline-none w-full ">
            <!-- Start -->
            <div class="lg:block items-center justify-center w-full">
               
                <div tabindex="0" aria-label="card 1" class="focus:outline-none  justify-center gap-4 flex lg:mb-0 bg-white pt-8 shadow rounded">
                <p tabindex="0" class="cursor-pointer focus:outline-none text-md font-medium leading-5 pt-2 text-green-800       pb-2 border-b-2 border-green-600 rounded-sm ">Questions</p>
                <p tabindex="0" class="cursor-pointer focus:outline-none text-md font-medium leading-5 pt-2 text-gray-800">Responses</p>
               
                </div>
            </div>
            <!-- End -->
        </div> 

        <div  tabindex="0" class="focus:outline-none py-2 w-full ">   
            
            <!-- Start -->
                <div class="lg:block items-center justify-center w-full ">
                    <div tabindex="0" aria-label="card 1" class=" focus:outline-none   lg:mb-0 mb-7 bg-white p-6 shadow rounded">
                        <div class="flex items-center border-b border-gray-200 pb-6">
                            <!-- <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar" class="w-12 h-12 rounded-full" /> -->
                            <div class="flex items-start justify-between w-full">
                                
                                <div class="pl-3 w-full">
                                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">Quiz 1</p>
                                    <!-- <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">36 responses</p> -->
                                </div>
                                
                            </div>
                        </div>

                        <div class="px-2 border-b  mb-4 pb-4">
                        <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Instruction</p>
                            <p tabindex="0" class="focouus:tline-none text-sm leading-5 py-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in deleniti exercitationem ipsum est quam incidunt laborum at, quae vel suscipit magni eligendi ipsa natus quos culpa. Quod, labore dolorem?</p>
                            
                        </div>
                        @for ($i = 1; $i <=  $count_question ; $i++)
                        <div class="px-2  border border-gray-200  mt-4 mb-4 pb-4">
                        <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Question # {{ $i }}</p>
                            <!-- <p tabindex="0" class="focouus:tline-none text-sm leading-5 py-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in deleniti exercitationem ipsum est quam incidunt laborum at, quae vel suscipit magni eligendi ipsa natus quos culpa. Quod, labore dolorem?</p> -->
                            
                            <div class="w-full ">
                                <textarea  placeholder=" Type your question here " cols="30" rows="3" class=" block w-full text-gray-700 border-b border-gray-200 rounded py-3 px-4 mb-3 leading-tight   focus:outline-none "> </textarea>
                                <p class="text-gray-600 text-xs italic">Please select the correct answer!</p>
                             
                            </div>
                            <!-- options -->
                            <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">
                
                            @for ($x = 1; $x <=  $count_option ; $x++)
                                <div class=" w-full flex ">
                                    <!-- <label for="last_email" class=" focouus:tline-none text-sm leading-5 py-4 text-gray-500">Email</label> -->
                                    <input  class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Option {{ $x }}" />
                                    <svg class="flex mt-2 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                                </div>      
                            @endfor 
                  
                            </div>
                            <select class="mt-4 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding bg-no-repeat  border border-solid border-gray-300 rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                <option selected>Select the correct answer</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <!-- /options -->
                            <div tabindex="0" class="focus:outline-none flex pt-6">
                                <button class="py-2 px-4 w-32 text-xs leading-3 text-white rounded-full bg-red-800">Remove</button>
                                <button wire:click.defer="add_option" class="py-2 px-4 w-32 ml-3 text-xs leading-3 text-white rounded-full bg-green-800">Add Options</button>
                             
                            </div>
                        </div>
                        @endfor 

                        <div class="border-t pt-2 ">
                            <button wire:click.defer="add_question" class=" py-2  w-32  text-xs leading-3 text-white h-8 rounded-full bg-green-800 my-4 justify-end ml-2">Add Question</button>
                            <button wire:click.defer="add_question" class=" py-2  w-32  text-xs leading-3 text-white h-8 rounded-full bg-blue-800 my-4 justify-end ml-2">Finish </button>
                        </div>
                        <!-- <div class="float-right">
                        
                            <a href="{{ route('quiz-teacher') }}" class="  py-3 px-9  w-28 h-10 text-xs leading-3 text-white h-8 rounded bg-red-800  justify-end ml-2">Cancel </a>
                            <button wire:click.defer="add_question" class="  py-2  w-28 h-10 text-xs leading-3 text-white h-8 rounded bg-indigo-800  justify-end ml-2">Done</button>
                       
                        </div> -->
                    </div>
                </div>
            <!-- End -->
            </div>
        

</div>
