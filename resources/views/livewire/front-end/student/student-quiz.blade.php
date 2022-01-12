<div>
    <!-- aaaa -->
    <div class="relative bg-white" >
        
        <!-- Header -->
        
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             

            </div>
          </div>
        </div>
        @if($result === false )
        <div class="px-4 md:px-10 mx-auto w-full  " style="margin-top: -160px">
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
              
              
                <!-- Tab -->
                
                    <!-- <div class="sm:hidden relative w-11/12 mx-auto bg-white rounded">
                        <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                           <img class="icon icon-tabler icon-tabler-selector" src="../svgs/white-bg-active-gray-svg1.svg" alt="selectors" />
                        </div>
                       
                    </div> -->
                    
                
                <!-- /tab -->
                <!-- End -->
              
                <!-- End -->

                <div class="flex-auto px-2 lg:px-10 py-10 pt-4 ">
                
                <div class="rounded-t mb-0 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center "
                    >
                    
                      <div class="relative flex w-full flex-wrap items-stretch">
                   
                    <!-- @if (Auth::user()->hasRole('teacher'))
                    <button  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded  mx-2 my-2 px-8 py-4">Add</button>
                    @endif  -->
                </div>
                </div>
                <!-- end -->
                <!-- Adding Question -->
                <div aria-label="group of cards" tabindex="0" class=" focus:outline-none pt-4 w-full rounded-t mb-0  border-0 bg-white ">
                    <!-- start -->
                    <div class="rounded-t mb-0  border-0 bg-white">
                        <div class="flex flex-wrap items-center">
                            <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                {{ $test->quiz_name }}
                            </h3> 
                            
                            <h3 class="py-2 text-sm text-blueGray-600">
                            Instruction
                            </h3> 

                            <h3 class=" text-sm text-blueGray-700">
                                {{ $test->instruction }}
                            </h3> 
                            
                            </div>
                            
                            <div
                            class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                            >
                            
                            <!-- <a href="" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-600">
                                Return
                            </a> -->
                            
                        </div>
                    </div>
                <!-- end -->
               </div>
             <!-- End -->
             
            
             <div class="pt-4 pl-5 flex justify-between mr-8">
             @if( $question && !$result )
               <p class="flex font-semibold text-sm text-blueGray-70">Question {{$next+1}} of  {{$count}}</p>
               <p class="flex font-semibold text-sm text-blueGray-70">Deadline: {{ Carbon\carbon::parse($test_deadline)->format('d/m/Y g:i A') }}</p>
             @endif
             </div>
             <!-- card -->
                <div aria-label="group of cards" tabindex="0"  class="focus:outline-none pt-2 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white shadow">
                   
                   <div class="lg:flex items-center justify-center w-full"  >
                  
                       <div tabindex="0" aria-label="card 1" style="width: 800px " class="bg-blue-200 focus:outline-none lg:w-12/12 lg:mr-0 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                           <div class="flex items-center border-b border-gray-200 pb-6 ">
                               <div class="flex items-start justify-between w-full ">
                             
                                   <div class="pl-3 w-full pr-2">
                                   
                                       <p tabindex="0" class="focus:outline-none text-md font-small leading-3 text-gray-800 ">@if( $question ) {{ $question->question }} @else No data found @endif </p>

                                   </div>
                                  <!-- button  -->
                                       @if (Auth::user()->hasRole('teacher'))
                                        <button wire:click=" "  class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600">
                                            Edit 
                                        </button>
                                        @elseif (Auth::user()->hasRole('student'))
                                        <!-- <a   href=""  class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-600"> Open    </a> -->
                                        @endif
                                
                                  <!-- buttom -->
                               </div>
                           </div>

                           
                           <div class="px-2">
                           
                          <form wire:submit.prevent="@if( $count > 0 ) submit({{ $question->id }}) @endif">
                           <div class="flex flex-col grid-cols-12" wire:ignore.self> 
                             <!-- ///////////////// sampleeeee -->
                              <input class="flex-inline"  wire:model.defer="number_of_times_hidden" type="hidden" value="" name="date_time" id="date_time" />
                             <!-- ////////////////samplee -->
                              @if( $count > 0 )
                                @foreach($questions[$next]->choices as $choices)
                                <label class="inline-flex items-center mt-3 w-full">

                                  
                                 
                                  <input checked wire:model.defer="answer" checked type="radio" class=" h-5 w-5"  value="{{$choices}}">
                                    <span class="ml-2 text-gray-700"> 

                                     {{$choices}}

                                    </span>
                                 
                                </label>
                                @endforeach
                              @endif

                            </div>   
                            @if( $count > 0 )
                            <button type="submit" id="submit" class="mr-2 mt-4 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600">
                                Submit 
                            </button>
                            @endif
                          </form>
                         
                           </div>
                       </div>
                   
                   </div>

               </div>
           
               @else
                <!-- result -->
              
              <div class="px-4 md:px-10 mx-auto w-full  " style="margin-top: -160px">
                <div class="flex flex-wrap">
                  <div class="w-full  px-4">
                    <div
                      class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
                    >
                    <div aria-label="group of cards" tabindex="0" class=" w-full focus:outline-none pt-2 w-full rounded-t mb-0  border-0 bg-white">
                            
                            <div class="lg:flex items-center justify-center w-full">

                                <div tabindex="0" aria-label="card 1" style="width: 800px " class="focus:outline-none lg:w-12/12 lg:mr-0 lg:mb-0 mb-7 bg-white p-2 rounded">
                                    <div class="flex items-center text-center border-gray-200 pb-6 ">
                               <div class="flex items-start justify-between w-full">
                                   <div class="pl-3 w-full block">
                                       <p tabindex="0" class=" focus:outline-none text-xl font-medium leading-5 text-blueGray-800 pb-5">Result </p>
                                       <p tabindex="0" class=" focus:outline-none text-md font-medium leading-5 text-blueGray-800">Score:  {{$test_result->result}}/{{$count}} </p>
                                       <button type="submit" class=" mt-4  items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600">
                                          Done 
                                      </button>
                                   </div>
                                
                              </div>
                            </div>
                     </div>
                    </div>
                  </div>
                </div>
                @endif
                <!-- result -->

              </div>
            </div>

        </div>
      </div>
     <!-- test -->
  
     <script>
          var number = 0
          document.addEventListener("visibilitychange", function(){

              if(document.hidden){
                //true
                var today = new Date();
                console.log('hidden');
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                var dateTime = date+' '+time;        console.log(dateTime);
                // itong var dateTime yong e sesend papuntang controller
                document.getElementById("date_time").value = dateTime 
                number++;
                
              }
              $( "#submit" ).click(function() {
                      // console.log('here');
                      // document.getElementById("date_time").value = dateTime ;
                      // console.log(dateTime);
                      // const getDateTime = document.getElementById("date_time").value = dateTime;                   
                      //  console.log(dateTime);
                       @this.number_of_times_hidden = number
                });
           
            });
          
      </script>
</div>