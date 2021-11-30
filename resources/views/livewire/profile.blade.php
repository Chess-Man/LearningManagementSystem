<div>
        <div class="mt-10 sm:mt-0 @if($show === true ) fixed @endif">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900"> Profile  </h3>
                    <p class="mt-1 text-sm text-gray-600">
                    Use a permanent address where you can receive mail.
                    </p>
                </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                    @if(session()->has('message'))
                        <div class="pb-4">
                        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>{{ session()->get('message') }}</p>
                        </div>
                        </div>
                    @endif
                        <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Diplay name</label>
                           
                            <input disabled value="{{ auth()->user()->name }}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Email address</label>
                          
                            <input disabled value="{{ auth()->user()->email }}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                            
                        </div>

                        
                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">First name</label>
                          
                            <input disabled value="{{ auth()->user()->userdetail->first_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Middle name</label>
                           
                          
                            <input disabled value="{{ auth()->user()->userdetail->middle_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Last name</label>
                           
                          
                            <input disabled value="{{ auth()->user()->userdetail->last_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>


                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Religion</label>
                        
                          
                            <input disabled value="{{ auth()->user()->userdetail->religion}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Nationality</label>
                        
                          
                            <input disabled value="{{ auth()->user()->userdetail->nationality}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label  class="block text-sm font-medium text-gray-700">Sex</label>
                          
                            <select wire:modal="sex" class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="{{ auth()->user()->userdetail->sex}}">{{ auth()->user()->userdetail->sex}}</option>
                        
                            </select>
                            
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Date of Birth</label>
                           
                          
                            <input disabled value="{{ auth()->user()->userdetail->date_of_birth}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Civil Status</label>
                          
                          
                            <input disabled value="{{ auth()->user()->userdetail->civil_status}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Place of Birth</label>
                          
                          
                            <input disabled value="{{ auth()->user()->userdetail->place_of_birth}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Phone number</label>
                          
                          
                            <input disabled value="{{ auth()->user()->userdetail->phone_number}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Street </label>
                
                    
                          
                            <input disabled value="{{ auth()->user()->userdetail->street}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">City</label>

                          
                    
                          
                            <input disabled value="{{ auth()->user()->userdetail->city}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Province</label>
                          
                        
                          
                            <input disabled value="{{ auth()->user()->userdetail->province}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Country</label>
                          
                            <input disabled value="{{ auth()->user()->userdetail->country}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                       
                        <p wire:click="doShow" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer  ">
                            Update
                        </p>
                        
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
           
            Update Profile
         
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
            <form action="" wire:submit.prevent="update">

                        
                        <div class="flex flex-col px-6 py-5 bg-gray-50">
                        @if($next === 1)
                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">First name</label>
                          
                            <input  wire:model.defer="first_name"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Middle name</label>
                           
                          
                            <input  wire:model.defer="middle_name"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Last name</label>
                           
                            <input  wire:model.defer="last_name"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>


                        
                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Religion</label>
                           
                            <input  wire:model.defer="religion"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Nationality</label>
                        
                          
                            <input  wire:model.defer="nationality"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>
                        @elseif ($next === 2)
                       

                        <div class="col-span-6 sm:col-span-2">
                            <label  class="block text-sm font-medium text-gray-700">Sex</label>
                          
                            <select wire:model.defer="sex" class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="{{ auth()->user()->userdetail->sex}}">{{ auth()->user()->userdetail->sex}}</option>
                            <option value="female">Female</option>
                         
                            <option value="male">Male</option>
                    
                            </select>
                            
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Date of Birth</label>
                           
                          
                            <input  wire:model.defer="date_of_birth"  type="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Civil Status</label>
                          
                          
                            <input  wire:model.defer="civil_status"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Place of Birth</label>
                          
                          
                            <input  wire:model.defer="place_of_birth"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Phone number</label>
                          
                          
                            <input  wire:model.defer="phone_number"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>
                        @elseif ($next === 3)
                
                        <div class="col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Street </label>
                
                    
                          
                            <input  wire:model.defer="street"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">City</label>

                          
                    
                          
                            <input  wire:model.defer="city"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Province</label>
                          
                        
                          
                            <input  wire:model.defer="province"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Country</label>
                          
                      
                          
                            <input  wire:model.defer="country"  type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            
                        </div>
                        @endif
               
            
            {{-- Create Account Form End --}}
            <hr />

                <div
                class="flex flex-row items-center justify-end p-5 gap-4 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
                >
                @if($next === 1)

                <p wire:click="add" class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500  rounded">
                    Next
                </p>

                @elseif($next === 2)
                <p wire:click="minus" class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500  rounded">
                    Previous
                </p>

                <p wire:click="add" class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500  rounded">
                    Next
                </p>
               
                @else
                <p wire:click="minus" class="cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500  rounded">
                    Previous
                </p>

                <button type="submit"class=" cursor-pointer px-4 py-2 text-white font-semibold bg-blue-500 rounded">
                    Save
                </button>
                @endif

                
               

                </div>
            </form>
        </div>

            {{-- end of modal--}}
</div>
