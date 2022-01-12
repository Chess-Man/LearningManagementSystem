<x-app-layout>
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
                      <h3 class="font-semibold text-lg text-blueGray-700">
                        Questions
                      </h3>  
                    
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
                   
                    <!-- @if (Auth::user()->hasRole('teacher'))
                    <button  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded  mx-2 my-2 px-8 py-4">Add</button>
                    @endif  -->
                </div>
                </div>
                </div>
                <!-- end -->
                <!-- Adding Question -->
                <div aria-label="group of cards" tabindex="0" style="width: 800px " class="focus:outline-none pt-4 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white shadow">
                <form action="{{ route('add-question-teacher') }}" method="POST">
                  @csrf
                   <div class="lg:flex items-center justify-center w-full"  style="width: 800px ">

                       <div tabindex="0" aria-label="card 1" style="width: 800px " class="bg-green-200 focus:outline-none lg:w-12/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                                 
                            <div class="flex items-center border-b border-gray-200 pb-6 ">
                               <div class="flex items-start justify-between w-full ">
                                   <div class=" w-full">
                          
                                       <textarea name="question" placeholder="Start typing your question here..." class="rounded-md focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full" id="" cols="30" rows="3"></textarea>
                                       @error('question')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                       @enderror
                                   </div>
                                 
                                   
                               </div>
                           </div>
                           
                           <div class="px-2">

                           
                           <div class="flex flex-col grid-cols-6/12">
                                    <input type="hidden" name="test_id" value="{{ $test_id }}" placeholder="option 1" class=" focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full rounded-md">
                                   
                                    <input autocomplete="off"  type="text" name="option[]" placeholder="option 1" class=" focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full rounded-md">
                                    <input autocomplete="off"  type="text" name="option[]" placeholder="option 2" class=" focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full rounded-md mt-2">
                                    <input autocomplete="off"  type="text" name="option[]" placeholder="option 3" class=" focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full rounded-md mt-2">
                                    <input autocomplete="off"  type="text" name="option[]" placeholder="option 4" class=" focus:outline-none text-sm bg-green-200 border-blue-400 font-medium leading-5 text-gray-800 w-full rounded-md mt-2">
                            </div>   
                         
                                  @if (Auth::user()->hasRole('teacher'))
                                      <button type="submit"  class="mt-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-600">Add  </button>
                                  @endif
                           </div>
                       </div>

                   </div>
                   </form>
               </div>
             <!-- End -->
                <livewire:front-end.teacher.show-questions :questions="$questions"/>

              </div>
            </div>
          </div>
          
        </div>
      </div>
     <!-- test -->
   
              
     
            
           
</div>

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
                $( "#submit" ).click(function() {
                  console.log('here');
                      // document.getElementById("date_time").value = dateTime ;
                      // console.log(dateTime);
                      const getDateTime = document.getElementById("date_time").value = dateTime;

                       console.log(dateTime);
                });
              }

            });
      </script>
</x-app-layout>
