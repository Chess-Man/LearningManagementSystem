<x-app-layout>
   
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>



        <table class="min-w divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Subject
                </th>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 Grade
                </th>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                 Remarks
                </th>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y  divide-gray-200">
              <tr>
                <td class="px-16 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                        English
                      </div>
                  </div>
                </td>
                <td class="px-16 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                          92
                      </div>
                  </div>
                </td>
                <td class="px-16 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                          Passed
                      </div>
                  </div>
                </td>
                <td class="px-16 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="#" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">
                     Update
                    </a>
                </td>
              </tr>
  
              <!-- More people... -->
            </tbody>
          </table>
          <div class="my-8">
            <a href="#" class="text-white rounded px-4 py-1 mx-1 bg-red-600 hover:bg-red-700">
               Cancel
               </a>
            <a href="#" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">
                Confirm
               </a>
          </div>






</x-app-layout>
