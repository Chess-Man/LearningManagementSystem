<x-app-layout>
   
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight">
            {{ __('grades') }}
        </h2>

        <table class="min-w divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Date
                </th>
                <th scope="col" class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
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
                         December 13, 2021
                      </div>
                  </div>
                </td>
                <td class="px-16 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                      <div class="text-sm font-medium text-gray-900">
                          Raquel Joy Ferrer
                      </div>
                  </div>
                </td>
                <td class="px-16 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('student') }}" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">
                      Open
                    </a>
                </td>
              </tr>
  
              <!-- More people... -->
            </tbody>
          </table>




</x-app-layout>
