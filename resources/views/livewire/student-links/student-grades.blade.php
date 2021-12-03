<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
<div>
<div>

<header class="mt-8 mb-4 flex gap-2 item-center">   
  <input type="search" wire:model="searchTerm" class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
</header>

<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Instructor
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Subject
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                Grade
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Remarks
              </th>
             
            
             
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($grades as $grade)
              <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                          {{ $grade->classes->user->name }}
                      </div>
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                          {{ $grade->classes->subject }}
                      </div>
                  </div>
                </td>
                <td class="px-6 py-4 text-sm">
                  <div class="text-sm text-gray-900">  {{ $grade->final_grade }} </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    @if($grade->final_grade < '75')
                      <span class="text-red-600">Failed</span>
                    @elseif ($grade->final_grade === 'N/A')
                      <span>Not Available</span>
                    @elseif ($grade->final_grade >= '75')
                      <span  class="text-green-600 ">Passed</span>
                    @endif
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


</div>
