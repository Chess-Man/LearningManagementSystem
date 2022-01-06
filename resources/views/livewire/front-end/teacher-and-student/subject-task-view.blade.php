<div>
    
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-16">
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
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-blueGray-700">
                        Students Works
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
                         class ="border px-3 py-3 placeholder-blueGray-500 text-blueGray-800 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10"
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
                    
                   
                  </div>
                </div>

                @if($showForm === true)
                    <div class="flex w-12/12 overflow-x-auto pt-4" wire:ignore.self>
                        
                        <div class="flex flex-wrap  ">
                        <form action="" wire:submit="update">
                        <div class="w-full lg:w-12/12 px-4 flex">
                            <div class="relative w-full mb-3">
                            <label
                                class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlFor="grid-password"
                            >
                                Score
                            </label>

                            <input
                                style="width:680px"
                                type="text"
                                class=" border-0 px-3 py-3 placeholder-blueGray-600 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 h-8"
                                wire:model="points"
                            />
                            
                            </div>
                            <button  type = "submit" class=" text-white rounded px-4  bg-green-600 hover:bg-green-700 h-8 mt-6 ml-2"> Save </button>
                        </div>
                        </div>
       
                        </form>

                    </div>
                @endif
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
                          Student Name
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Date Submitted
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Due Date
                        </th>

                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        Points
                        </th>

                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                         Status
                        </th>
                       
                        <th
                          class=" align-end border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($tasks as $task)
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                        
                          <span class=" font-bold text-blueGray-600">
                          {{ $task->user->name }}
                          </spa>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ \Carbon\Carbon::parse($task->task->created_at )->format('d/m/Y')}}
                        </td>
                       
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ \Carbon\Carbon::parse($task->task->deadline )->format('d/m/Y H:i')}}
                        </td>

                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ $task->points }} 
                        </td>

                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ $task->status }}
                        </td>
                        
                 
                        <td
                        class="border-t-0 gap-2 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
     

                          <a href="#" wire:click="edit({{ $task }} )" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700 py-2" >Score</a>
                          <a href="#" button wire:click="download({{ $task->id }} )" class="text-white rounded px-4 py-1 mx-1  bg-indigo-600 hover:bg-indigo-700 py-2 " >Download</a>
                          
                       
                     
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


