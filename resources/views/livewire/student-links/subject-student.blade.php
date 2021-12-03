<div>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subject 
        </h2>
        <header class="mt-8 mb-4 flex gap-2 justify-between pr-5 item-center">  
          <input type="search"  class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search..."/>
            
            <div class="flex gap-2 pr-5 ">
                @if($showList === false)
                    <button wire:click.defer="doShowList" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
                    </button>  
                    @else
                    <button wire:click.defer="doCloseList" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.8);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg> 
                    </button>  
                @endif
            

            <button wire:click.defer="doShow" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
                Join
            </button>
            
            </div>
        
        </header>
        @if($showList === false)

        @if(session()->has('message'))
            <div class="pb-4">
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session()->get('message') }}</p>
                </div>
            </div>
        @endif
        {{-- cards --}}
           <div class="flex flex-wrap gap-4 items-center">
                   
          
         @forelse ($students as $student)
         {{-- card --}}
          
              <div class="p-4 w-full card rounded-lg md:w-1/2">
              <a href="{{ route('subjects-content' , ['subject' => $student->classes])}}" >
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 8v11.529S6.621 19.357 12 22c5.379-2.643 10-2.471 10-2.471V8s-5.454 0-10 2.471C7.454 8 2 8 2 8z"></path><circle cx="12" cy="5" r="3"></circle></svg>
                </div>
                 
                 <h2 class="text-lg font-semibold title-font mb-2"> {{ $student->classes->subject }} </h2>
                 <p class="leading-relaxed text-3xl font-bold">
                 {{ $student->classes->description }}
                 </p> 

               
                </a>

             
              </div>
            
            {{-- card --}}
         @empty
                <div class="px-6 py-4 bg-gray-100  text-lg font-medium text-gray-700 ">
                  No data
                </div>
         @endforelse
          
          

             </div>
             
     {{-- end of cards --}}

    @endif

     {{-- show list of subjects--}}

        @if($showList === true)
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
                        Description
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
                        <div class="text-sm text-gray-900"> {{ $student->classes->subject }} </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $student->classes->description }}
                        </td>
                    
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                            <a href="{{ route('subjects-content' , ['subject' => $student->classes ])}}" class=" text-gray-500 rounded px-2 py-1 mx-1  ">Open</a>
                            <button  wire:click="delete({{ $student->id }} )" class=" text-gray-500 rounded px-2 py-1 mx-1  ">Delete</button>

                        </td>

                        @empty
                        <td class="px-6 py-4 bg-gray-100  text-md font-medium text-gray-700 ">
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
        @endif
        {{--end show list of subjects--}}
     {{-- modal --}}

<div class="bg-black bg-opacity-50 absolute inset-0 @if($show === false) hidden @endif justify-center items-center" id="subjectModal">
<div class="my-14 flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
    <div
    class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
    >
    <p class="font-semibold text-gray-800">
   
    Subject
 
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
    {{-- Update Form --}}
    <form action="" wire:submit.prevent="join">

                <div class="flex flex-col px-6 py-5 bg-gray-50">
              
                <div class="col-span-6 sm:col-span-3">
                    <label  class="block text-sm font-medium text-gray-700">Class Code</label>
                  
                    <input  wire:model.defer="code"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md  @error('code')border-red-600 @enderror">
                    @error('code')
                    <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                    </span>
                    @enderror
                </div>

            {{-- Create Account Form End --}}
            <hr />

                <div
                class="flex flex-row items-center justify-end pt-4 gap-4 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                >

                <button type="submit"class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                    Save
                </button>
                </div>
    </form>
</div>

    {{-- end of modal--}}
    
        <style>
               .card {
                    --tw-shadow: 3px 5px 8px 1px rgba(14, 26, 187, 0.5), 0 10px 10px -5px rgba(25, 69, 212, 0.04);
                     box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                    position: relative;
                    }

                    @media (min-width: 1280px) {
                        .card {
                            width: 31.333333%;
                        }
                    }

                .card::before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #5F5EF8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(2):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #7158D8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(3):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #29C890;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
        </style>

  
 
</div>
