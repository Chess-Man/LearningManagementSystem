<div>
<div>

<header class="mt-8 mb-4 flex gap-2 item-center">   
  <input type="search" wire:model="searchTerm" class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
  @if(Auth::user()->hasRole('teacher'))
  <p wire:click.defer="doShow" class="flex items-center cursor-pointer justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
     Create 
  </p>
  @endif
</header>

@if(session()->has('message'))
<div class="pt-4">
  <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{ session()->get('message') }}</p>
  </div>
</div>
@endif

<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                Instruction
              </th>

              <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                File
              </th> -->


              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date Uploaded
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Due Date
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Points
              </th>
             
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                <span>Action</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($tasks as $task)
              
            
            <tr>

            <td class="px-6 py-4 text-sm">
                <div class="text-sm text-gray-900">  {{$task->name}} </div>
              </td>

              <td class="px-6 py-4 text-sm">
                <div class="text-sm text-gray-900">  {{$task->instruction}} </div>
              </td>

              <!-- <td class="px-6 py-4 text-sm">
                <div class="text-sm text-gray-900">  {{$task->file_path}} </div>
              </td>
               -->

              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                {{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y')}}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                 {{ $task->deadline }}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                 {{ $task->points }} 
              </td>
           
              <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium ">
              @if (Auth::user()->hasRole('teacher'))
                <a  href="{{ url('/subjects/view/task' , ['task' => $task])}}" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700">Open</a>
                <button  wire:click="delete({{ $task->id }} )" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700">Delete</button>
              @elseif(Auth::user()->hasRole('student'))
                <a  href="{{ url('/subjects/view/student/task' , ['task' => $task])}}" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700">Open</a>
                <button wire:click="download({{ $task->id }} )" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">Download</button>
              @endif
              </td>
            </tr>
            @empty
            
                <td class="px-6 pt-4 bg-gray-100  text-md font-medium text-gray-700 ">
                  No data
                </td>

            @endforelse
          </tbody>
        </table>
        {{--links--}}
          <div class="p-2">
          {{ $tasks->links() }}
          </div>
        {{--links--}}
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
      <span> Add Tasks </span>
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
    <form action="" wire:submit.prevent="create">
    <div class="flex flex-col px-6 py-5 bg-gray-50">

        <div class="grid grid-cols-1 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"> Name</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('name') border-red-500 @enderror"  type="text" wire:model="name"/>
        @error('name')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Instruction</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('instruction') border-red-500 @enderror"  type="text" wire:model="instruction"/>
        @error('instruction')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Points</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('points') border-red-500 @enderror"  type="text" wire:model="points"/>
        @error('points')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Due Date</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('deadline') border-red-500 @enderror"  type="datetime-local" wire:model="deadline"/>
        @error('deadline')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">File</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('file') border-red-500 @enderror"  type="file" wire:model="file"/>
        @error('file')
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
