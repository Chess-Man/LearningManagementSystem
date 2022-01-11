<div>
    
    @foreach ($questions as $questions)
                <div aria-label="group of cards" tabindex="0" style="width: 800px " class="focus:outline-none pt-4 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white shadow">
                   
                   <div class="lg:flex items-center justify-center w-full"  style="width: 800px ">
                   <form  wire:submit.prevent ="answer ({{ $questions }})">
                       <div tabindex="0" aria-label="card 1" style="width: 800px " class="bg-yellow-200 focus:outline-none lg:w-12/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                           
                            <div class="flex items-center border-b border-gray-200 pb-6 ">
                               <div class="flex items-start justify-between w-full ">
                                   <div class="pl-3 w-full pr-2">
                                       <p tabindex="0" class="focus:outline-none text-md font-small leading-3 text-gray-800 ">{{$loop->iteration}}.  {{ $questions->question }}</p>
                        
                                   </div>
                                  <!-- button  -->
                                       @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600">
                                            Answer 
                                        </button>

                                        <button wire:click.prevent="confirmUserRemoval({{ $questions->id }} )"  class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-600">
                                            Delete 
                                        </button>
                                        
                                        @elseif (Auth::user()->hasRole('student'))
                                        <a   href=""  class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-600"> Open    </a>
                                      @endif
                                
                                  <!-- buttom -->
                               </div>
                           </div>
                           <div class="px-2">

                          
                           <div class="flex flex-col grid-cols-12">
                                @foreach ($questions->choices as $choices)
                                <label class="inline-flex items-center rounded-full pl-4 mt-1 w-full h-10  @if($choices === $questions->correct_answer) bg-green-400 @endif">
                               
                                  <input  wire:model.defer="correct_answer" type="radio" class=" h-5 w-5" value="{{ $choices }}">
                                    <span class="ml-2 text-gray-700 "> 
                                   
                                        {{ $choices }}
                                                                          
                                    </span>
                                 
                                </label>
                                @endforeach
                            </div>   
                         

                           </div>
                       </div>
                    </form>
                   </div>
                   
                </div>
             
    @endforeach
 
</div>
