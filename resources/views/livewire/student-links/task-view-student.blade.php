<div>
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
<div class="text-gray-500">
        <form action="#" wire:submit.prevent="create">
            <div class="sm:rounded-md sm:overflow-hidden">         
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      
                    <label class="block text-lg  text-gray-700">
                        Task Name
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        
                      <span class=" focus:ring-indigo-500 focus:border-indigo-500 flex-1  block w-full  rounded-none rounded-r-md sm:text-sm lg:text-base border-gray-300 py-1  ">
                        {{ $tasks->task->name }}
                        
                        </span>
                      </div>
                    </div>
                </div>

                <div class=" py-5 space-y-6 sm:py-6">

                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label class="block text-lg text-gray-700" >
                          Instruction
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span class=" focus:ring-indigo-500 focus:border-indigo-500 flex-1  block w-full rounded-none rounded-r-md sm:text-sm lg:text-base border-gray-300 py-1 " >
                      {{ $tasks->task->instruction }}
                      </span>
                    </div>
                  </div>
                </div>

              <div class=" py-5 space-y-6 sm:py-6">
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label class="block text-lg text-gray-700">
                      Date Uploaded:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >
                        {{ \Carbon\Carbon::parse($tasks->task->created_at)->format('d/m/Y')}} 
                      </span>
                    </div>
                  </div>
                </div>
    
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg  text-gray-700"
                    >
                      Due Date:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >
                      {{ $tasks->task->deadline }}
                      </span>
                    </div>
                  </div>
                </div>
    
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg text-gray-700"
                    >
                      Points:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >  
                        {{ $tasks->points }} /  {{ $tasks->task->points }} 
                      </span>
                    </div>
                  </div>
                </div>  
             
                <label class="inline-block mb-2 text-lg text-gray-700">File Upload</label>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                Attach a file</p>
                        </div>
                        <input type="file" class="opacity-0"  wire:model="file_path"/>
                    </label>

                </div>
                @error('file_path')
                  <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                      {{ $message }}
                  </span>
                @enderror
           

                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg text-gray-700"
                    >
                      You Works:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >  
                        {{ $tasks->file_path }} / 
                      </span>
                    </div>
                  </div>
                </div> 


              <div class="py-3 sm:py-4">
                <button
                  type="submit"
                  class="
                    inline-flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    shadow-sm
                    text-sm
                    font-medium
                    rounded-md
                    text-white
                    bg-indigo-600
                    hover:bg-indigo-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-indigo-500
                  "
                >
                  Save
                </button>
              </div>
            </div>
          </form>
    </div>
</div>
