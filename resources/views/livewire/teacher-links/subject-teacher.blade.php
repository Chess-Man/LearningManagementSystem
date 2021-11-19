<div>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subject
        </h2>
        <header class="mt-8 mb-4 flex gap-2 item-center">  
          <input type="search"  class="focus:ring-indigo-500 py-2 focus:border-indigo-500 block w-72 pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Search..."/>
          <button id="show-subject-modal" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-800">
              Create 
          </button>
        </header>
        
        {{-- cards --}}
           <div class="flex flex-wrap gap-4 items-center">

            {{-- card --}}
             <div class="p-4 w-full card rounded-lg md:w-1/2">
                <a href="{{route('subject-content-task')}}" >
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform: ;msFilter:;"><path d="M3 20c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15zM5 5h2v2h10V5h2v15H5V5z"></path><path d="M14.292 10.295 12 12.587l-2.292-2.292-1.414 1.414 2.292 2.292-2.292 2.292 1.414 1.414L12 15.415l2.292 2.292 1.414-1.414-2.292-2.292 2.292-2.292z"></path></svg>
                </div>
                 <h2 class="text-lg font-semibold title-font mb-2">Unfinished Task</h2>
                 <p class="leading-relaxed text-3xl font-bold">
                     17
                   </p> 
                </a>  
              </div>
       

               {{-- card --}}
             <div class="w-full p-4 card rounded-lg md:w-1/2">
               <a href="{{route('subject-content-task')}}">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform: ;msFilter:;"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg>
                </div>
                  <h2 class="text-lg font-semibold title-font mb-2">New Modules Uploaded</h2>
                  <p class="leading-relaxed text-3xl font-bold">
                      24
                    </p>   
               </a>
              </div>
       

               {{-- card --}}
             <div class="w-full p-4 card rounded-lg md:w-1/2">
                <div class="w-10 h-10 inline-flex items-center justify-center rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform: ;msFilter:;"><path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"></path><path d="M8 6h9v2H8z"></path></svg>
                </div>
                  <h2 class="text-lg font-semibold title-font mb-2">Learning Progress</h2>
                  <p class="leading-relaxed text-3xl font-bold">
                      70%
                    </p>   
              </div>




             </div>
             
     {{-- end of cards --}}

     {{-- modal --}}

    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="subjectModal">
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
        <div
          class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
        >
          <p class="font-semibold text-gray-800">Add a step</p>
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
        <div class="flex flex-col px-6 py-5 bg-gray-50">
          <p class="mb-2 font-semibold text-gray-700">Bots Message</p>
          <textarea
            type="text"
            name=""
            placeholder="Type message..."
            class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
            id=""
          ></textarea>
          <div class="flex flex-col sm:flex-row items-center mb-5 sm:space-x-5">
            <div class="w-full sm:w-1/2">
              <p class="mb-2 font-semibold text-gray-700">Customer Response</p>
              <select
                type="text"
                name=""
                class="w-full p-5 bg-white border border-gray-200 rounded shadow-sm appearance-none"
                id=""
              >
                <option value="0">Add service</option>
              </select>
            </div>
            <div class="w-full sm:w-1/2 mt-2 sm:mt-0">
              <p class="mb-2 font-semibold text-gray-700">Next step</p>
              <select
                type="text"
                name=""
                class="w-full p-5 bg-white border border-gray-200 rounded shadow-sm appearance-none"
                id=""
              >
                <option value="0">Book Appointment</option>
              </select>
            </div>
          </div>
          <hr />

          <div class="flex items-center mt-5 mb-3 space-x-4">
            <input
              class="inline-flex rounded-full"
              type="checkbox"
              id="check1"
              name="check1"
            />
            <label class="inline-flex font-semibold text-gray-400" for="check1">
              Add a crew</label
            ><br />
            <input
              class="inline-flex"
              type="checkbox"
              id="check2"
              name="check2"
                   checked
            />
            <label class="inline-flex font-semibold text-blue-500" for="check2">
              Add a specific agent</label
            ><br />
          </div>
          <div
            class="flex flex-row items-center justify-between p-5 bg-white border border-gray-200 rounded shadow-sm"
          >
            <div class="flex flex-row items-center">
              <img
               
                class="w-10 h-10 mr-3 rounded-full"
                src="https://randomuser.me/api/portraits/lego/7.jpg"
                alt=""
              />
              <div class="flex flex-col">
                <p class="font-semibold text-gray-800">Xu Lin Bashir</p>
                <p class="text-gray-400">table.co</p>
              </div>
            </div>
            <h1 class="font-semibold text-red-400">Remove</h1>
          </div>
        </div>
        <div
          class="flex flex-row items-center justify-end p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
          <button class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
            Save
          </button>
        </div>
      </div>
    
        {{-- end of modal--}}

        <script>
            window.addEventListener('DOMContentLoaded', () =>{
                const subjectModal = document.querySelector('#subjectModal')
                const showModal = document.querySelector('#show-subject-modal')
                const closeModal = document.querySelector('#close-modal')

                const toggleModal = () => {
                    subjectModal.classList.toggle('hidden')
                    subjectModal.classList.toggle('flex')
                }

                showModal.addEventListener('click', toggleModal)

                closeModal.addEventListener('click', toggleModal)
            })
        </script>

    
        <style>
                .card {
                    --tw-shadow: 0 20px 25px -5px rgba(14, 26, 187, 0.5), 0 10px 10px -5px rgba(25, 69, 212, 0.04);
                     box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                    position: relative;
                    }

                    @media (min-width: 1280px) {
                        .card {
                            width: 31.333333%;
                        }
                    }

                .card::before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #5F5EF8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(2):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #7158D8;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
                .card:nth-child(3):before{
                    position: absolute;
                    content: "";
                    height: 8rem;
                    width: 2rem;
                    background: #29C890;
                    top: 50%;
                    right: 0;
                    transform: translateY(-50%);
                    border-top-left-radius: 3rem;
                    border-bottom-left-radius: 3rem;
                }
        </style>

  
 
</div>
