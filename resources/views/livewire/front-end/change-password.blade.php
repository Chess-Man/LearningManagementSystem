<div>
  <!-- change password -->
<div class="relative bg-blueGray-50">
        <!-- Header -->
        
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
             
            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-10 mx-auto w-full " style="margin-top: -160px">
          <form a wire:submit.prevent="updatePassword">
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                      Change Password
                    </h6>
                    <button
                      class="bg-blue-700 text-white active:bg-blue-800 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      type="submit"
                    >
                      Save Changes
                    </button>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  
                  
                    <div class="flex flex-wrap">
                     
                      <div class="w-full lg:w-9/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Current Password
                          </label>
                          <input
                          
                           wire:model.defer="current_password"
                           type="password"
                           class="border-0 px-3 py-3 placeholder-blueGray-600 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"

                          />
                          @error('current_password')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                          @enderror
                        </div>
                      </div>
                     
                      <div class="w-full lg:w-9/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            New Password
                          </label>
                          <input
                            wire:model.defer="new_password"
                            type="password"
                            class="border-0 px-3 py-3 placeholder-blueGray-600 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                         
                          />

                          @error('new_password')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="w-full lg:w-9/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Confirm Password
                          </label>
                          <input
                          wire:model.defer="new_password_confirmation"
                            type="password"
                            class=" border-0 px-3 py-3 placeholder-blueGray-600 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            
                          />

                          @error('new_password_confirmation')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                              </span>
                          @enderror
                        </div>
                      </div>
                     
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />
  
                </div>
              </div>
            </div>
          
          </div>
          </form>
        </div>
      </div>

</div>
