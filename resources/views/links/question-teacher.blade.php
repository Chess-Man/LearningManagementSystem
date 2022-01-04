<x-app-layout>
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
            
                            <div class="px-2  mt-4 mb-4 pb-4 border-2 border-gray-600">
                            @forelse ($tests as $test)
                                <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Question # {{$loop->iteration}} </p>
                                    <!-- <p tabindex="0" class="focouus:tline-none text-sm leading-5 py-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in deleniti exercitationem ipsum est quam incidunt laborum at, quae vel suscipit magni eligendi ipsa natus quos culpa. Quod, labore dolorem?</p> -->
                                   
                                    <div class="w-full ">

                                        <textarea name="question"  cols="30" rows="3" class="block w-full text-gray-700 border-b border-gray-200 rounded py-3 px-4 mb-3 ">{{ $test->question }} </textarea>
                                         
                                    </div>
                                    <!-- options -->
                                    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">
                        

                                        @foreach ($test->choices as $choices)
                                        <div class=" w-full flex ">
                                            
                                            <input value="{{ $choices }}" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Option 2" />
                                    
                                        </div>  
                                        @endforeach
                                      

                                      
                                            
                                    </div>
                                    
                                    <select name="correct_answer" class="  mt-4 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding bg-no-repeat  border border-solid border-gray-300 rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                        <option value="{{ $test->correct_answer}}">{{ $test->correct_answer}}</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="3">Option 4</option>
                                    </select>

                                    @empty

                                        <div>Empty</div>

                                   
                                      
                                    <!-- /options -->
                                    <div tabindex="0" class="focus:outline-none flex pt-6">
                                    
                                    </div>
                                </div>
                                @endforelse
                            </div>
                           
                                   
                <!-- End -->
                

              
                        @if(session()->has('message'))
                           
                            <div class="text-center pt-2">
                            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex w-full" role="alert">
                                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Success</span>
                                <span class="font-semibold mr-2 text-left flex-auto">{{ session()->get('message') }}</span>
                                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                            </div>
                            </div>

                        @endif
                        <!-- Inputs -->
                        <form action="{{ route('add-question-teacher') }}" method="POST">
                            @csrf
                            <div class="px-2  mt-4 mb-4 pb-4 border-2 border-gray-600">
                                <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Add Question </p>
                                    <!-- <p tabindex="0" class="focouus:tline-none text-sm leading-5 py-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in deleniti exercitationem ipsum est quam incidunt laborum at, quae vel suscipit magni eligendi ipsa natus quos culpa. Quod, labore dolorem?</p> -->
                                
                                    <div class="w-full ">
                                        <textarea name="question" placeholder=" Type your question here " cols="30" rows="3" class="  @error('question') border-red-500 @enderror block w-full text-gray-700 border-b border-gray-200 rounded py-3 px-4 mb-3 leading-tight   focus:outline-none "> </textarea>
                                             @error('question')
                                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                                </span>
                                             @enderror
                                    </div>
                                    <!-- options -->
                                    <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 pt-6 gap-8">

                                        <input type="hidden" name="test_id" value="{{ $test_id }}" class=" text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow"  />
                                                        
                                        <div class=" w-full block ">
                                            <label for="option" class="text-sm text-gray-600">Option 1</label> 
                                            <input autocomplete="off" name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" />
                                    
                                        </div>  

                                        <div class=" w-full block ">
                                            <label for="option" class="text-sm text-gray-600">Option 2</label> 
                                            <input autocomplete="off" name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" />
                                    
                                        </div>  

                                        <div class=" w-full block ">
                                            <label for="option" class="text-sm text-gray-600" >Option 3</label> 
                                            <input autocomplete="off" name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" />
                                    
                                        </div> 

                                        <div class=" w-full block ">
                                            <label for="option" class="text-sm text-gray-600">Option 4</label> 
                                            <input autocomplete="off" name="option[]" class="text-gray-600  font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" />
                                    
                                        </div> 
                                            
                                    </div>
                                    
                                    <select  name="correct_answer" class=" @error('correct_answer') border-red-600 @enderror mt-4 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700  bg-white bg-clip-padding bg-no-repeat  border border-solid border-gray-300 rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                        <option value="">Select the correct answer</option>
                                        <option value="Option 1">Option 1</option>
                                        <option value="Option 2">Option 2</option>
                                        <option value="Option 3">Option 3</option>
                                        <option value="Option 4">Option 4</option>
                                    </select>
                                      
                                    @error('correct_answer')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    <!-- /options -->
                                    <div tabindex="0" class="focus:outline-none flex pt-6">
                                    
                                    </div>
                                    
                                    <div class="border-t pt-2 flex justify-end gap-2">
                                        <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 text-xs font-semibold py-3 px-6 bg-indigo-700 rounded focus:outline-none hover:bg-indigo-600 leading-3 text-white h-10">Add Question </button>
                                    </div>
                            </div>
                               
                               
                       
                            </div>
                        </form>
                        <!-- /Inputs -->
</x-app-layout>
