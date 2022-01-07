<div>
     <!-- test -->
   
                <div class="rounded-t mb-0 px-4 py-3 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                    
                      <div class="relative flex w-full flex-wrap items-stretch">
                        <span
                          class="z-10 h-full leag-snugdin font-normal absolute text-center text-blueGray-500 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
                          ><i class="fas fa-search"></i
                        ></span>
                        <input
                          wire:model.debounce.100ms="search"
                          type="text"
                          placeholder="Search here..."
                          class="border px-3 py-3 placeholder-blueGray-500 text-blueGray-800 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10"
                        />
                        <div class="sk-chase " wire:loading wire:target="search" >
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                          <div class="sk-chase-dot"></div>
                        </div>
                      </div>
                   
                    </div>
                    @if (Auth::user()->hasRole('teacher'))
                    <button wire:click="showForm" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded  mx-2 my-2 px-8 py-4">Add</button>
                    @endif
                </div>
                </div>
                <!-- end -->
                @forelse ($tasks as $task)
              
                <div aria-label="group of cards" tabindex="0" style="width: 800px " class="focus:outline-none pt-4 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white">
                   
                   <div class="lg:flex items-center justify-center w-full"  style="width: 800px ">

                       <div tabindex="0" aria-label="card 1" style="width: 800px " class="focus:outline-none lg:w-12/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                           <div class="flex items-center border-b border-gray-200 pb-6">
                               <div class="flex items-start justify-between w-full">
                                   <div class="pl-3 w-full">
                                       <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800"> {{$task->name}} </p>
                                       <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">Points: {{$task->points}}</p>
                                       <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">Create at:    {{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y')}}</p>
                                       <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">Deadline:  {{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y H:i')}}</p>
                                   </div>
                                   @if (Auth::user()->hasRole('teacher'))
                                   <a  href="{{ url('/subjects/view/task' , ['task' => $task])}}" class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-600"> Open    </a>
                                   <button   wire:click="edit({{ $task }} )" class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-600">
                                        Edit 
                                    </button>
                                   <button  wire:click="delete({{ $task->id }} )" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-600">
                                        Delete 
                                    </button>
                                    @elseif (Auth::user()->hasRole('student'))
                                    <a   href="{{ url('/subjects/view/student/task' , ['task' => $task])}}"  class="mr-2 flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-600"> Open    </a>
                                    @endif
                               </div>
                           </div>
                           <div class="px-2">
                               <p class="focus:outline-none text-sm leading-5 pt-4 text-gray-600">Instruction</p>
                               <p tabindex="0" class="focus:outline-none text-sm leading-5 pt-4 text-gray-600"> {{ $task->instruction }}</p>
                               <p wire:click="download({{ $task->id }} )" tabindex="0" class="focus:outline-none text-sm leading-5 pt-4 mt-4 cursor-pointer text-gray-600 shadow border pl-2 pb-4 bg-gray-100">{{ $task->file_path }}</p>   
                           </div>
                       </div>

                   </div>

               </div>
             
        @empty
                    <div aria-label="group of cards" tabindex="0" class="focus:outline-none pt-4 w-full rounded-t mb-0 px-4 py-3 border-0 bg-white">
                            
                            <div class="lg:flex items-center justify-center w-full">

                                <div tabindex="0" aria-label="card 1" style="width: 800px " class="focus:outline-none lg:w-12/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow-md border-t-1  rounded">
                                    <div class="flex items-center text-center border-gray-200 pb-6 ">
                               <div class="flex items-start justify-between w-full">
                                   <div class="pl-3 w-full">
                                       <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">No data found</p>
                                   </div>
                              </div>
                     </div>
                           

                   </div>

         </div>

        @endforelse
            
            <!-- modal -->
            <div id="popup" class="hidden z-50 fixed w-full flex justify-center inset-0" wire:ignore.self>
            <div onclick="popuphandler(false)" class="w-full h-full bg-gray-200 z-0 absolute inset-0"></div>
            <div class="mx-auto container">
                <div class="flex items-center justify-center h-full w-full">
                    <div class="bg-white rounded-md shadow fixed overflow-y-auto sm:h-auto w-10/12 md:w-8/12 lg:w-1/2 2xl:w-2/5">
                        <div class="bg-gray-100 rounded-tl-md rounded-tr-md px-4 md:px-8 md:py-4 py-7 flex items-center justify-between">
                            @if($show === 'update')
                            <p class="text-base font-semibold">Update Task</p>
                            @else
                            <p class="text-base font-semibold">Add Task</p>
                            @endif
                          
                         
                           
                            <button role="button" aria-label="close label" wire:click="hideForm" class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 focus:outline-none">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/add_user-svg1.svg" alt="icon"/>
                               
                            </button>
                        </div>
                        <div class="px-4 md:px-10 pt-6 md:pt-12 md:pb-4 pb-7">
                            
                            <form class="" action="" wire:submit.prevent="@if($show === 'update') update @else  create @endif">
                              <div class="grid grid-cols-1 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('name') border-red-500 @enderror"  type="text" wire:model="name"/>
                              @error('name')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Instruction</label>
                               <textarea class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('instruction') border-red-500 @enderror name=" id="" cols="30" rows="3"   wire:model="instruction"></textarea>
                             
                              </div>

                              <div class="grid grid-cols-1 mx-7 mt-5">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Points</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('points') border-red-500 @enderror"  type="text" wire:model="points"/>
                              @error('points')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1 mx-7 mt-5">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Deadline</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('deadline') border-red-500 @enderror"  type="datetime-local" wire:model="deadline"/>
                              @error('deadline')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1 mx-7 mt-5">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">File</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('name') border-red-500 @enderror"  type="file" wire:model="file"/>
                              @error('file')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                            
                            <div class="flex items-center justify-between mt-9">
                                <button wire:click="hideForm" role="button" aria-label="close button" onclick="popuphandler(false)" class="focus:ring-2 focus:ring-offset-2 focus:bg-gray-600 focus:ring-gray-600 focus:outline-none px-6 py-3 bg-gray-600 hover:bg-gray-500 shadow rounded text-sm text-white">Cancel</button>
                                <button aria-label="add user" type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800 focus:outline-none px-6 py-3 bg-indigo-700 hover:bg-opacity-80 shadow rounded text-sm text-white">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

               <!-- test/ -->
</div>
