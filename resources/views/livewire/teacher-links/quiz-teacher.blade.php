<div>

        <div aria-label="group of cards" tabindex="0" class="focus:outline-none w-full">
            <!-- Start -->
            <div class="lg:block items-center justify-center w-full">
               
                <div tabindex="0" aria-label="card 1" class="focus:outline-none  justify-between flex lg:mb-0 mb-7 bg-white p-6 shadow rounded">
                <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 pt-2 text-gray-800">Quiz </p>
                <button wire:click.defer="doShow" class="py-2 px-4 w-24 h-10 text-xs leading-3 text-white rounded bg-red-800">Add Quiz</button>
                </div>
            </div>
            <!-- End -->
        </div> 

        <!-- questions -->
        <div aria-label="group of cards" tabindex="0" class="focus:outline-none py-1 w-full">
            <!-- Start -->
            @forelse($tests as $test)
            <div class="lg:block items-center justify-center w-full">
                <div tabindex="0" aria-label="card 1" class="focus:outline-none   lg:mb-0 mb-7 bg-white p-6 shadow rounded">
                    <div class="flex items-center border-b border-gray-200 pb-6">
                        <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar" class="w-12 h-12 rounded-full" />
                        <div class="flex items-start justify-between w-full">
                            
                            <div class="pl-3 w-full">
                                <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">{{ $test->quiz_name}}</p>
                                <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">36 responses</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="px-2">
                    <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 ">Instruction </p>
                        <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600"> {{ $test->instruction }}</p>
                        <div tabindex="0" class="focus:outline-none flex">
                            <button class="py-2 px-4 w-24 text-xs leading-3 text-white rounded-full bg-red-800">Delete</button>
                            <button class="py-2 px-4 w-24 ml-3 text-xs leading-3 text-white rounded-full bg-green-800">Update</button>
                            <a href="{{ route('question-teacher',  $test )}}" class="py-2 px-4 w-24 ml-3 text-xs leading-3 text-white rounded-full bg-blue-800 text-center">Open</a>
                           
                          </div>
                    </div>
                </div>
            </div>
            @empty 
                <h1> Empty</h1>
            @endforelse
            <!-- End -->
        </div> 
        <!-- /questions -->

        {{-- modal --}}

<div class="bg-black bg-opacity-50 absolute inset-0 @if($show === false ) hidden  @endif justify-center items-center" id="subjectModal">
  
  <div class="my-14 flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
    
    <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
        
        <p class="font-semibold text-gray-800">
        <span> Add Quiz </span>
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

    <!-- Modal -->
    <form action="" wire:submit.prevent="create">

      <div class="flex flex-col px-6 py-5 bg-gray-50">

        <div class="grid grid-cols-1 mx-7">

          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"> Quiz Name </label>
          <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('quiz_name') border-red-500 @enderror"  type="text" wire:model="quiz_name"/>
         
          @error('quiz_name')
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

        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Number of Questions</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('number_of_questions') border-red-500 @enderror"  type="text" wire:model="number_of_questions"/>

        @error('number_of_question')
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
        {{ $message }}
        </span>
        @enderror
        </div>
       
        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Duration</label>
        <select class=" @error('duration') border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent " wire:model="duration">
            <option >Select</option>
            
            <option value="15">15 Minutes</option>
            <option value="30">30 Minutes</option>
            <option value="1">1 Hour</option>
            <option value="2">2 Hour</option>
           
        </select>
        @error('duration')
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
    <!-- End of Modal -->
</div>
