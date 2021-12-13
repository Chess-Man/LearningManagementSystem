<div>
<div>

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students Work
            
</h2>
<header class="mt-8 mb-4 flex gap-2 item-center">   
  <input type="search" wire:model="searchTerm" class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
</header>

<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                Student
              </th>

           
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                Submitted at
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                Due Date
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                Points
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                Status
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                Action
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($tasks as $task)
                
              <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                        
                       {{ $task->user->name }}
                       
                      </div>
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                  {{ \Carbon\Carbon::parse($task->task->created_at )->format('d/m/Y')}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                  {{ \Carbon\Carbon::parse($task->task->deadline )->format('d/m/Y H:i')}}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                {{ $task->points }} 
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                 {{ $task->status }} 
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                  <button wire:click="edit({{ $task }} )" class="text-white rounded px-4 py-1 mx-1 bg-green-600 hover:bg-green-700">Score</button>
                  <button wire:click="download({{ $task->id }} )" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">Download</button>
                </td>

                 @empty
                  <td class="px-6 py-4 text-md font-medium text-gray-700 ">
                    No data
                  </td>

              </tr>
              @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

{{-- modal --}}

<div class="bg-black bg-opacity-50 absolute inset-0 @if($show === false ) hidden  @endif justify-center items-center" id="subjectModal">
  <div class="my-14 flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
    <div
      class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
    >
      <p class="font-semibold text-gray-800">
      <span> Return Points </span>
    </p>
      <svg
        wire:click.prevent="doClose()"
        class="w-6 h-6"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M6 18L18 6M6 6l12 12"
        ></path>
      </svg>
    </div>
    {{-- Create Account Form --}}
    <form action="" wire:submit.prevent="update">
    <div class="flex flex-col px-6 py-5 bg-gray-50">


        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Points</label>
        <input class="py-2  rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('deadline') border-red-500 @enderror"  type="text" wire:model="points"/>
        @error('points')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        </div>
    
    </div>
    
    {{-- Create Account Form End --}}
      <hr />

        <div
        class="flex flex-row items-center justify-end p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
        <button type="submit"class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
            Save
        </button>
        </div>
        </form>
  </div>

    {{-- end of modal--}}

</div>
