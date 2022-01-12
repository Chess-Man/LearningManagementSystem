<div>
    <!-- aaaa -->
    <div class="relative bg-white" >
        
        <!-- Header -->
        
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
               

            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-10 mx-auto w-full b- " style="margin-top: -160px">
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
              <div class="rounded-t mb-0 px-4 py-3 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="capitalize font-semibold text-lg text-blueGray-700">
                        {{ $user->name }}
                      </h3>  

                      <div class="flex my-4 align-center justify-between">
                      <h3 class="text-sm text-blueGray-700">
                       Score: {{$result}}/{{$count}}
                      </h3>

                      @if( $testResult != null)
                      <h3 class="mb-2 text-sm text-blueGray-700 bg-blue-800 rounded-full px-2 py-2 text-white">
                        Inactive {{ $testResult->log }}x
                      </h3>
                      @endif
                      </div>
                     
                    </div>
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                    
                  
                    
                </div>
                </div>
              
                <!-- Tab -->
                
                <div class="sm:hidden relative w-11/12 mx-auto bg-white rounded">
                        <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                           <img class="icon icon-tabler icon-tabler-selector" src="../svgs/white-bg-active-gray-svg1.svg" alt="selectors" />
                        </div>
                       
                    </div>
                    
                
                <!-- /tab -->
                <!-- End -->
              
                <!-- End -->

                <div class="flex-auto px-2 lg:px-10 py-10 pt-4 ">
                
                <div class="rounded-t mb-0 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                    
                      <div class="relative flex w-full flex-wrap items-stretch">
                </div>
                </div>
                <!-- end -->
                <!-- Adding Question -->
                </div>
                @foreach($questions as $question)
                <div>
                    
                 
                    <div aria-label="group of cards" tabindex="0" style="width: 800px " class="focus:outline-none pt-4 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white shadow">
                        <div class="lg:flex items-center justify-center w-full"  style="width: 800px ">
                            <div tabindex="0" aria-label="card 1" style="width: 800px " class="bg-blue-200 focus:outline-none lg:w-12/12 lg:mr-0 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                                    
                                    <div class="flex items-center border-b border-gray-200 pb-6 ">
                                        <div class="flex items-start justify-between w-full ">
                                            <div class="pl-3 w-full pr-2">
                                                <p tabindex="0" class="focus:outline-none text-md font-small leading-3 text-gray-800 ">{{ $loop->iteration }}. {{ $question->question }}</p>                                  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2">

                                    <div class="flex flex-col grid-cols-12">
                                        @foreach ($question->choices as $choices )
                                                                                  
                                            <label class="inline-flex items-center rounded-full pl-4 mt-1 w-full h-10 @if($choices === $question->correct_answer) bg-green-400 @endif">
                                            <input  wire:model.defer="correct_answer" type="radio" class=" h-5 w-5" value="{{$choices}}">
                                                <p class="ml-2 text-gray-700 flex-inline  items-start justify-between"> 
                                                    <span class="text-sm "></span>
                                                    {{ $choices }}
                                                    </span>
                                                    <span class="text-xs pl-2">
                                                    @if($choices === $question->correct_answer)(Correct answer) @endif             
                                                    </span>
                                                </p>
                                            </label>
                                         
                                        @endforeach

                                        @foreach ($question->response as $response)
                                              <p class="mt-2 ml-4">Response: {{ $response->answer }} </p>
                                        @endforeach                                                           
                                    </div>   
                                  
                            </div>
                        </div>        
                    </div>  
                </div>
       
            </div>
            @endforeach

                <!-- questions -->

              </div>
            </div>
          </div>
          
        </div>
      </div>
     <!-- test -->
   
              
     
            
           
</div>

