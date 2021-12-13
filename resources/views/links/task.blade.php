<x-app-layout>

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
</h2>

        <div class="mt-10 sm:mt-0 pt-4">
            <div class="md:grid md:grid-cols-2 md:gap-4">
                <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-2xl font-black leading-6 text-gray-900 font-serif"> Activity 1  </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Due 12/13/2021 10:15 PM 
                    </p>

                    <p class="mt-1 text-sm text-gray-700 pt-3">
                        Instructions
                    </p>

                    <p class="mt-1 text-sm text-gray-800 pt-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quos omnis eaque vel nobis cumque necessitatibus assumenda temporibus quisquam voluptates veritatis minus error autem nam magnam, quae laborum et consectetur.
                    </p>
                </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-1 ">
                    <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                
                        <div class="grid grid-cols-6 gap-4">

                        <div class="col-span-8 sm:col-span-3">

                          <label class="text-sm font-medium text-gray-900 block mb-2" for="user_avatar">Upload Your Work</label>
                          <input class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                        <!-- <div class="mt-1 text-sm text-gray-500" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div> -->
                        </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
                       
                        <p wire:click="doShow" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer  ">
                            Upload
                        </p>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>

       

</x-app-layout>
