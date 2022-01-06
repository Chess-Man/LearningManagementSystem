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
                        Accounts
                      </h3>  
                    </div>
                    
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
                    
                    <button wire:click="showForm" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded  mx-2 my-2 px-8 py-4">Add</button>
                  </div>
                </div>
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
                          Name
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Email
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Role
                        </th>
                       
                        <th
                          class=" align-end border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                          <img
                            src="data:image/jpeg;base64,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"
                            class="h-12 w-12 bg-white rounded-full border"
                            alt="..."
                          />
                          <span class="ml-3 font-bold text-blueGray-600">
                           {{ $user->name}}
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                         {{ $user->email }}
                        </td>
                        @foreach($user->roles as $role)
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                          {{$role->name }}
                        </td>
                        @endforeach
                        <td
                        class="border-t-0 gap-2 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                        @if(Auth::user()->hasRole('teacher'))

                          @if ($role->name !== 'admin'  )

                          <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700 " wire:click.prevent="edit({{ $user }} )" >Update</a>
                          <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700 " wire:click.prevent="confirmUserRemoval({{ $user->id }} )">Remove</a>
                          
                          @elseif ($role->name === 'admin' )

                          <button class="text-white rounded px-4 py-1 mx-1  bg-gray-600 hover:bg-gray-700 " >Update</button>
                          <button class="text-white rounded px-4 py-1 mx-1  bg-gray-600 hover:bg-gray-700 " >Remove</button>
                          @endif
                        @else

                          <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700 " wire:click.prevent="edit({{ $user }} )" >Update</a>
                          <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700 " wire:click.prevent="confirmUserRemoval({{ $user->id }} )">Remove</a>
                        @endif
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
                  <div class="p-4 ">
                  {{ $users->links() }}
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- modal -->
    
 
        <div id="popup" class="hidden z-50 fixed w-full flex justify-center inset-0" wire:ignore.self>
            <div onclick="popuphandler(false)" class="w-full h-full bg-gray-200 z-0 absolute inset-0"></div>
            <div class="mx-auto container">
                <div class="flex items-center justify-center h-full w-full">
                    <div class="bg-white rounded-md shadow fixed overflow-y-auto sm:h-auto w-10/12 md:w-8/12 lg:w-1/2 2xl:w-2/5">
                        <div class="bg-gray-100 rounded-tl-md rounded-tr-md px-4 md:px-8 md:py-4 py-7 flex items-center justify-between">
                            @if($show === 'update')
                            <p class="text-base font-semibold">Update Account</p>
                            @else
                            <p class="text-base font-semibold">Add Account</p>
                            @endif
                           
                            <button role="button" aria-label="close label" wire:click="hideForm" class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 focus:outline-none">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/add_user-svg1.svg" alt="icon"/>
                               
                            </button>
                        </div>
                        <div class="px-4 md:px-10 pt-6 md:pt-12 md:pb-4 pb-7">
                            
                            <form class="mt-4" action="" wire:submit.prevent="  @if($show === 'update')update @else create @endif">
                              <div class="grid grid-cols-1 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Display Name</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('name') border-red-500 @enderror"  type="text" wire:model="name"/>
                              @error('name')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                              <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('email') border-red-500 @enderror"  type="text" wire:model="email"/>
                              @error('email')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                              <div class="grid grid-cols-1">
                                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password</label>
                                  <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('password') border-red-500 @enderror" type="password" wire:model="password"/>
                              @error('password')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>

                              <div class="grid grid-cols-1">
                                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Confirm Password</label>
                                  <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent @error('confirm_password') border-red-500 @enderror" type="password" wire:model="confirm_password"/>
                              @error('confirm_password')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>
                              </div>

                              @if ($show !== 'update')
                              <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Role</label>
                              <select class=" @error('role') border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent " wire:model="role">
                                  <option >Select</option>
                                  @if(Auth::user()->hasRole('teacher'))
                                  <option value="2">Teacher</option>
                                  <option value="3">Student</option>
                                  @elseif (Auth::user()->hasRole('admin'))
                                  <option value="1">Admin</option>
                                  <option value="2">Teacher</option>
                                  <option value="3">Student</option>
                                  @endif
                              </select>
                              @error('role')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                              @enderror
                              </div>
                              @endif
                            
                            <div class="flex items-center justify-between mt-9">
                                <button wire:click="hideForm" role="button" aria-label="close button" onclick="popuphandler(false)" class="focus:ring-2 focus:ring-offset-2 focus:bg-gray-600 focus:ring-gray-600 focus:outline-none px-6 py-3 bg-gray-600 hover:bg-gray-500 shadow rounded text-sm text-white">Cancel</button>
                                <button aria-label="add user" role="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-800 focus:outline-none px-6 py-3 bg-indigo-700 hover:bg-opacity-80 shadow rounded text-sm text-white">Add User</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
</div>


