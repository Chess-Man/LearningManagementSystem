<div>
    
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-16">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
              
            </div>
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full bg-white "  style="margin-top: -175px">
          <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
              >
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full  max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-blueGray-700">
                        Responses
                      </h3>  
                      <h3 class="font-semibold text-md text-blueGray-700">
                        {{ $test_name }}
                      </h3> 
                    </div>
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                      <div class="relative flex w-full flex-wrap items-stretch">
                        <!-- <span
                          class="z-10 h-full leag-snugdin font-normal absolute text-center text-blueGray-500 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
                          ><i class="fas fa-search"></i
                        ></span>
                        <input
                          wire:model.debounce.100ms="search"
                          type="text"
                          placeholder="Search here..."
                          class="border px-3 py-3 placeholder-blueGray-500 text-blueGray-800 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10"
                        /> -->
                        <div class="sk-chase " wire:loading wire:target="search">
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- <button wire:click="showForm" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded  mx-2 my-2 px-8 py-4">Add</button> -->
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                  <!-- Projects table -->
                  <table
                    class="items-center w-full bg-transparent border-collapse"
                  >
                    <thead>

                      <tr>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Name
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Points
                        </th>
                       
                        <th
                          class=" align-end border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($test_results as $result)
                      <tr>
                        <th
                          class="capitalize border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-left flex items-center"
                        >
                          
                          <span class=" font-bold text-blueGray-600">
                           {{ $result->user->name }}
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 "
                        >
                         {{ $result->result }}/{{$number_of_questions}}
                        </td>
                           
                        <td
                        class="border-t-0 gap-2 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-right"
                        >
                          <a href="{{ route('subjects-quiz-responses-log' , $result )}}" class="text-white rounded px-4 py-2 mx-1  bg-green-600 hover:bg-green-700 ">Open</a>
                          <!-- <a href="#" class="text-white rounded px-4 py-2 mx-1  bg-red-600 hover:bg-red-700 ">Remove</a> -->
                          
                        </td>
                      </tr>
                      @empty
                      <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          No data found
                      </td>
                    @endforelse
                     
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>
        </div>
        
</div>




