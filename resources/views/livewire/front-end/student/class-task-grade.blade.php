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
                      <h3 class="font-semibold text-lg text-blueGray-700 py-3">
                        Grade
                      </h3>  
                    </div>
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                      <div class="relative flex w-full flex-wrap items-stretch">
                      
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
                          Subject
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Instructor
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Grade
                        </th>

                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Remark
                        </th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($grades as $grade)
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                        >
                         
                          <span class=" font-bold text-blueGray-600">
                          {{ $grade->classes->user->name }}
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ $grade->classes->subject }}

                        </td>
                
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                         {{ $grade->final_grade }}
                        </td>

                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            @if($grade->final_grade < '75')
                                <span class="text-red-600">Failed</span>
                                @elseif ($grade->final_grade === 'N/A')
                                <span>Not Available</span>
                                @elseif ($grade->final_grade >= '75')
                                <span  class="text-green-600 ">Passed</span>
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
               
                </div>
              </div>
            </div>
        </div>

    
    
</div>


