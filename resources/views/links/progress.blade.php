<x-app-layout>
    
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
     Progress
</h2>
    

<header class="mt-8 mb-4 flex gap-2 item-center">   
<input type="search"  class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
<a href="" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
 Create 
</a>
</header>

<div class="flex flex-col">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200 table-auto">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name
          </th>
         
        
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
         
          <td class="px-6 py-4 text-sm">
            <div class="text-sm text-gray-900">John Michael P. Valdez</div>
          </td>
        
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="{{ route('progress-content') }}" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700">View</a>
            <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700">Delete</a>
          </td>
        </tr>

      
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
   

</x-app-layout>
