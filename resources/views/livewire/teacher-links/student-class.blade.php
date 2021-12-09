<div>
<div>

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
                Grade
              </th>

              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Remarks
              </th>
             
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                <span>Action</span>
              </th>

            </tr>

          </thead>

          <tbody class="bg-white divide-y divide-gray-200">

            @forelse ($students as $student)

                <tr>

                    <td class="px-6 py-4 text-sm">
                        <div class="text-sm text-gray-900"> {{ $student->user->name }} </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $student->final_grade }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        @if($student->final_grade < '75')
                         <span class="text-red-600">Failed</span>
                        @elseif ($student->final_grade === 'N/A')
                         <span>Not Available</span>
                        @elseif ($student->final_grade >= '75')
                        <span  class="text-green-600 ">Passed</span>
                        @endif
                    </td>
                
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <button  wire:click.prevent="edit({{ $student }} )" class="text-white rounded px-4 py-1 mx-1 bg-green-600 hover:bg-green-700"> Update </button>
                    </td>

                    @empty
                  <td class="px-6 py-4  text-md font-medium text-gray-700 ">
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
    
    <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
      
      <p class="font-semibold text-gray-800">
      <span> Update Grade</span>
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
        >

        </path>
        </svg>

    </div>
    {{-- Create Account Form --}}
    <form action="" wire:submit.prevent="update">

    <div class="flex flex-col px-6 py-5 bg-gray-50">

        <div class="grid grid-cols-1 mx-7">
        
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"> Name</label>
        <input disabled class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent"  type="text" wire:model="name"/>
       
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
       
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Grade</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('final_grade') border-red-500 @enderror"  type="text" wire:model="final_grade"/>
       
        @error('final_grade')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
          {{ $message }}
        </span>
        @enderror
        
        </div>

    </div>
    
    
    {{-- Create Account Form End --}}
      <hr/>

        <div class="flex flex-row items-center justify-end p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
         
          <button type="submit"class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
              Save
          </button>
       
        </div>
        
      </form>

  </div>

    {{-- end of modal--}}
</div>
