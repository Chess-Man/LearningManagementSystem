<x-app-layout>
  
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>

        <form action="#" method="POST">
            <div class="sm:rounded-md sm:overflow-hidden">         
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label
                        class="block text-lg  text-gray-700 font-bold"
                      >
                        Instructions:
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                          class="
                            focus:ring-indigo-500 focus:border-indigo-500
                            flex-1
                            block
                            w-full
                            rounded-none rounded-r-md
                            sm:text-sm
                            lg:text-base
                            border-gray-300
                            py-1
                          "
                        >
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis laudantium sed non perspiciatis ex sunt. Cupiditate quibusdam esse quasi expedita!
                        </span>
                      </div>
                    </div>
                  </div>


              <div class=" py-5 space-y-6 sm:py-6">
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg text-gray-700 font-bold"
                    >
                      Date Uploaded:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >
                        June 4, 2021
                      </span>
                    </div>
                  </div>
                </div>
    
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg  text-gray-700 font-bold"
                    >
                      Due Date:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >
                        June 7, 2021
                      </span>
                    </div>
                  </div>
                </div>
    
                <div class="grid grid-cols-3 gap-6">
                  <div class="col-span-3 sm:col-span-2">
                    <label
                      class="block text-lg text-gray-700 font-bold"
                    >
                      Points:
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          lg:text-base
                          border-gray-300
                          py-1
                        "
                      >
                        4 / 100
                      </span>
                    </div>
                  </div>
                </div>
    
                <div>
                  <label class="block text-lg text-gray-700 font-bold">
                    Upload File:
                  </label>
                  <div
                    class="
                      mt-1
                      flex
                      justify-center
                      px-6
                      pt-5
                      pb-6
                      border-2 border-gray-300 border-dashed
                      rounded-md
                    "
                  >
                    <div class="space-y-1 text-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="
                          mx-auto
                          h-12
                          w-12
                          text-gray-400
                          mb-5
                          icon icon-tabler icon-tabler-file-upload
                        "
                        width="48"
                        height="48"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#000000"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path
                          d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"
                        />
                        <line x1="12" y1="11" x2="12" y2="17" />
                        <polyline points="9 14 12 11 15 14" />
                      </svg>
    
                      <div class="flex text-sm text-gray-600">
                        <label
                          for="file-upload"
                          class="
                            relative
                            cursor-pointer
                            bg-white
                            rounded-md
                            font-medium
                            text-indigo-600
                            hover:text-indigo-500
                            focus-within:outline-none
                            focus-within:ring-2
                            focus-within:ring-offset-2
                            focus-within:ring-indigo-500
                          "
                        >
                          <span>Upload a file</span>
                          <input
                            id="file-upload"
                            name="file-upload"
                            type="file"
                            class="sr-only"
                          />
                        </label>
                        <p class="pl-1">upload file</p>
                      </div>
                      <p class="text-xs text-gray-500">docx, pdf, GIF up to 10MB</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="py-3 sm:py-4">
                <button
                  type="submit"
                  class="
                    inline-flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    shadow-sm
                    text-sm
                    font-medium
                    rounded-md
                    text-white
                    bg-indigo-600
                    hover:bg-indigo-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-indigo-500
                  "
                >
                  Upload
                </button>
              </div>
            </div>
          </form>

</x-app-layout>
