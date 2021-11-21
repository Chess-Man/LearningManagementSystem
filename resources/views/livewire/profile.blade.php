<div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">
                    Use a permanent address where you can receive mail.
                    </p>
                </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                <form >
                    <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Email address</label>
                            @if ($update === true)
                            <input wire:model="email" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->email}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                            @endif
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">First name</label>
                            @if ($update === true)
                            <input wire:model="first_name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->first_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Middle name</label>
                             @if ($update === true)
                            <input wire:model="middle_name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->middle_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Last name</label>
                             @if ($update === true)
                            <input wire:model="last_name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->last_name}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>


                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Religion</label>
                             @if ($update === true)
                            <input wire:model="religion" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->religion}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Nationality</label>
                             @if ($update === true)
                            <input wire:model="nationality" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->nationality}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label  class="block text-sm font-medium text-gray-700">Sex</label>
                          
                            @if ($update === true)
                            <select wire:modal="sex" class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="{{ auth()->user()->userdetail->sex}}">{{ auth()->user()->userdetail->sex}}</option>
                            @if ( auth()->user()->userdetail->sex === 'male')
                            <option value="male">Female</option>
                            @else
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            @endif
                            </select>
                            @else
                            <select disabled class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>{{ auth()->user()->userdetail->sex}}</option>
                            </select>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Date of Birth</label>
                           
                            @if ($update === true)
                            <input wire:model="date_of_birth" type="date"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @else
                            <input disabled value="{{ auth()->user()->userdetail->date_of_birth}}" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label  class="block text-sm font-medium text-gray-700">Civil status</label>
                           

                            @if ($update === true)
                            <select wire:modal="sex" class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="{{ auth()->user()->userdetail->civil_status}}">{{ auth()->user()->userdetail->civil_status}}</option>
                            @if ( auth()->user()->userdetail->civil_status === 'maried')
                                <option value="single">Single</option>
                                <option value="widowed">Widowed</option>
                                <option value="divorced">Divorced</option>
                            @elseif (auth()->user()->userdetail->civil_status === 'sigle')
                                <option value="maried">Maried</option>
                                <option value="widowed">Widowed</option>
                                <option value="divorced">Divorced</option>
                            @elseif (auth()->user()->userdetail->civil_status === 'widowed')
                                <option value="single">Single</option>
                                <option value="maried">Maried</option>
                                <option value="divorced">Divorced</option>
                            @else
                                <option value="single">Single</option>
                                <option value="maried">Maried</option>
                                <option value="widowed">Widowed</option>
                               
                            @endif
                            </select>
                            @else
                            <select disabled class="mt-1 block w-full py-2 px-3 capitalize border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="{{ auth()->user()->userdetail->civil_status}}">{{ auth()->user()->userdetail->civil_status}}</option>
                            <option>Maried</option>
                            <option>Single</option>
                            <option>Widowed</option>
                            <option>Divorced</option>
                            </select>
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Place of Birth</label>
                            <input wire:model="place_of_birth" type="text"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label  class="block text-sm font-medium text-gray-700">Phone number</label>
                            <input wire:model="phone_number" type="text"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Street </label>
                            <input wire:model="street" type="text"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">City</label>
                            <input wire:model="city" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Province</label>
                            <input wire:model="province" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                            <label  class="block text-sm font-medium text-gray-700">Country</label>
                            <input wire:model="country" type="text"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                       
                        @if ($update === true)
                        <p  wire:click.defer="noUpdate"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer  ">
                            Cancel
                        </p>
                        <button type="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer  ">
                            Save 
                        </button>
                        @else
                        <p  wire:click.defer="doUpdate"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer  ">
                            Update
                        </p>
                        @endif
                    </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
</div>
