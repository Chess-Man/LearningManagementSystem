<div>
            @if($showForm === true)
                <div class="flex w-12/12 overflow-x-auto pt-4" wire:ignore.self>
                    
                    <div class="flex flex-wrap  ">
                    <form action="" wire:submit="update">
                      <div class="w-full lg:w-12/12 px-4 flex">
                        <div class="relative w-full mb-3">
                          <label
                            class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Grade
                          </label>

                          <input
                            style="width:680px"
                            type="text"
                            class=" border-0 px-3 py-3 placeholder-blueGray-600 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 h-8"
                            wire:model="final_grade"
                          />
                         
                        </div>
                        <button  type = "submit" class=" text-white rounded px-4  bg-green-600 hover:bg-green-700 h-8 mt-6 ml-2"> Save </button>
                      </div>
                    </div>
                    
                    </form>

                </div>
            @endif
                <div class="block w-full overflow-x-auto ">
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
                          Grade
                        </th>
                        <th
                          class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                          Remarks
                        </th>
                       
                        <th
                          class=" align-end border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                        >
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($students as $student)
                      <tr>
                        <th
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left 
                          "
                        >
                        
                          <span class=" font-bold text-blueGray-600">
                          {{ $student->user->name }}
                          </span>
                        </th>
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                        {{ $student->final_grade }}
                        </td>
                    
                        <td
                          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            @if($student->final_grade < '75')
                            <span class="text-red-600">Failed</span>
                            @elseif ($student->final_grade === 'N/A')
                            <span>Not Available</span>
                            @elseif ($student->final_grade >= '75')
                            <span  class="text-green-600 ">Passed</span>
                            @endif
                        </td>
                    
                        <td
                        class="border-t-0 gap-2 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                      
                        <button  wire:click.prevent="edit({{ $student }} )" class="text-white rounded px-4 mx-1 bg-green-600 hover:bg-green-700 py-2"> Grade </button>
                        <a  href="{{ route('student-learning-progress' , ['student' => $student->user_id])}}" class="py-2 text-white rounded px-4  mx-1  bg-indigo-600 hover:bg-indigo-700">Progress</a>
                      
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
