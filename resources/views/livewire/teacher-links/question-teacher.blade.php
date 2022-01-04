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
                                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">{{ $quiz_name }}</p>
                                    <!-- <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">36 responses</p> -->
                                </div>
                                
                            </div>
                        </div>
                        
                        <form action="" wire:submit.prevent="next_question(Object.fromEntries(new FormData($event.target)))">
                            <div class="px-2  mt-4 mb-4 pb-4">
                                <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Question 1 </p>
                                    <!-- <p tabindex="0" class="focouus:tline-none text-sm leading-5 py-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in deleniti exercitationem ipsum est quam incidunt laborum at, quae vel suscipit magni eligendi ipsa natus quos culpa. Quod, labore dolorem?</p> -->
                                
                                    <div class="w-full ">
                                        <textarea wire:model="question" placeholder=" Type your question here " cols="30" rows="3" class="  @error('question') border-red-500 @enderror block w-full text-gray-700 border-b border-gray-200 rounded py-3 px-4 mb-3 leading-tight   focus:outline-none "> </textarea>
                                             @error('question')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                    </div>
                                    <!-- options -->
                                    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">
                        
            

                                        <div class=" w-full flex ">
                                            
                                            <input name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Option 1" />
                                            
                                            @error('number_of_question')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                        </div>  

                                        <div class=" w-full flex ">
                                            
                                            <input name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Option 1" />
                                            
                                            @error('number_of_question')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                        </div>  

                                        <div class=" w-full flex ">
                                            
                                            <input name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Option 1" />
                                            
                                            @error('number_of_question')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                        </div>  

                                      

                                    

                                            
                                    </div>
                                    
                                    <select  wire:model="correct_answer" class="mt-4 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding bg-no-repeat  border border-solid border-gray-300 rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                        <option selected>Select the correct answer</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="3">Option 4</option>
                                    </select>
                                    <!-- /options -->
                                    <div tabindex="0" class="focus:outline-none flex pt-6">
                                        <button wire:click.defer="remove_question" class="py-2 px-4 w-32 text-xs leading-3 text-white rounded-full bg-red-800">Remove</button>
                                        <button wire:click.defer="add_option" class="py-2 px-4 w-32 ml-3 text-xs leading-3 text-white rounded-full bg-green-800">Add Options</button>
                                    
                                    </div>
                                </div>
                               

                                <div class="border-t pt-2 flex justify-end">
                                    <!-- <p wire:click="prev" class="cursor-pointer bg-white border border-white p-2 rounded text-gray-700 flex items-center focus:outline-none focus:shadow-outline">
                                    <svg width="24" height="24" viewBox="0 0 16 16">
                                    <path d="M9 4 L5 8 L9 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                                    </svg>
                                    <span class="mx-2">Back</span>
                                    </p> -->

                                    <button type="submit" class="cursor-pointer bg-white border border-white p-2 rounded text-gray-700 flex items-center focus:outline-none focus:shadow-outline">
                                        <span class="mx-2">Next</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                                        </svg>
                                    </button>

                                    <!-- submit -->
                                    <!-- <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 text-xs font-semibold py-3 px-6 bg-indigo-700 rounded focus:outline-none hover:bg-indigo-600 leading-3 text-white h-10">Done</button> -->
                                    <!-- <button type="submit"  class="   w-32  text-xs leading-3 text-white h-8 rounded-full bg-blue-800 my-4 ml-2">Finish </button> -->
                                </div>
                       
                            </div>
                        </form>
                </div>
            <!-- End -->
            </div>
        

</div>
