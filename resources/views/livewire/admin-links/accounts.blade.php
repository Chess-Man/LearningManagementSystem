<div>


<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Account
</h2>  

<header class="mt-8 mb-4 flex gap-2 item-center">   
<input type="search"  class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search...">
<button id="show-modal" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
 Create Account 
</button>
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
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
            Description
          </th>
          <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Date Uploaded
          </th>
          <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Due Date
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Points
          </th>
          <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            <span>Action</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="text-sm font-medium text-gray-900">
                 Task Name
                </div>
            </div>
          </td>
          <td class="px-6 py-4 text-sm">
            <div class="text-sm text-gray-900">Lorem ipsum dolor sit.</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            January 10, 2021
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              February 08, 2021
          </td>   
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            89
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="#" class="text-white rounded px-4 py-1 mx-1 bg-indigo-600 hover:bg-indigo-700">Download</a>
            <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-green-600 hover:bg-green-700">Open</a>
            <a href="#" class="text-white rounded px-4 py-1 mx-1  bg-red-600 hover:bg-red-700">Delete</a>
          </td>
        </tr>

      
      </tbody>
    </table>
  </div>
</div>
</div>
</div>

{{-- modal --}}

<div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="subjectModal">
  <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
    <div
      class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
    >
      <p class="font-semibold text-gray-800">Create an Account</p>
      <svg
        id="close-modal"
        class="w-6 h-6"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M6 18L18 6M6 6l12 12"
        ></path>
      </svg>
    </div>
    {{-- Create Account Form --}}
    <form action="" wire:submit.prevent="create">
    <div class="flex flex-col px-6 py-5 bg-gray-50">

        <div class="grid grid-cols-1 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent" type="text" wire:model.defer="email"/>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Password</label>
            <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent" type="password" wire:model.defer="password"/>
        </div>

        <div class="grid grid-cols-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Confirm Password</label>
            <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent" type="password" wire:model.defer="confirm_password"/>
        </div>
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Role</label>
        <select class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent" wire:model.defer="role">
            <option >Select</option>
            <option value="1">Admin</option>
            <option value="2">Teacher</option>
            <option value="3">Student</option>
        </select>
        </div>

        <!-- <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Another Input</label>
        <input class="py-2 px-3 rounded-lg border-2 border-gray-300  mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600  focus:border-transparent" type="text" placeholder="Another Input" />
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload Photo</label>
        <div class='flex items-center justify-center w-full'>
            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-gray-300  group'>
                <div class='flex flex-col items-center justify-center pt-7'>
                  <svg class="w-10 h-10 text-gray-400  group-hover:text-gray-600 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  <p class='lowercase text-sm text-gray-400 group-hover:text-gray-600  pt-1 tracking-wider'>Select a photo</p>
                </div>
              <input type='file' class="hidden" />
            </label>
        </div>
        </div> -->
    </div>
    
    {{-- Create Account Form End --}}
      <hr />

        <div
        class="flex flex-row items-center justify-end p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
        <button type="submit"class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
            Save
        </button>
        </div>
        </form>
  </div>

    {{-- end of modal--}}

    <script>
        window.addEventListener('DOMContentLoaded', () =>{
            const subjectModal = document.querySelector('#subjectModal')
            const showModal = document.querySelector('#show-modal')
            const closeModal = document.querySelector('#close-modal')

            const toggleModal = () => {
                subjectModal.classList.toggle('hidden')
                subjectModal.classList.toggle('flex')
            }

            showModal.addEventListener('click', toggleModal)

            closeModal.addEventListener('click', toggleModal)
        })
    </script>

    

</div>
