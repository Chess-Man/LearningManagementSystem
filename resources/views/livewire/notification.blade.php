<div>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>

            <div class="w-full  h-full overflow-x-hidden " id="notification">
                
            @forelse ($notifications as $notification)
                    <div class="w-full p-3 mt-8 bg-white rounded flex">
                        
                            <div  class="pl-3">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none ">
                                    {{ $notification->data['name']}} 

                                    @if($notification->read_at === null)
                                    <span wire:click.defer="read({{ $notification  }})" class="justify-end text-indigo-800 cursor-pointer"> Mark as read</span>
                                    @else
                                    <span wire:click.defer="unread({{ $notification  }})" class="justify-end text-indigo-800 cursor-pointer"> Mark as unread</span>
                                    @endif
                                </p> 
                                <!-- <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p> -->
                            </div>
                    </div>
            @empty
                <div class="px-6 py-4 text-md font-medium text-gray-700 ">
                    No data found
                </div>
            @endforelse
                  <div wire:click.defer="MarkAllAsRead" class="text-indigo-800 pt-2 ml-6 cursor-pointer">Mark all as read  </div>
            </div>    

            <!-- notification -->
            
            <!-- <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification">
                <div class="2xl:w-4/12 bg-gray-50 h-screen overflow-y-auto p-8 absolute right-0">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800">Notifications</p>
                        <button role="button" aria-label="close modal" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 rounded-md cursor-pointer" onclick="notificationHandler(false)">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg1.svg" alt="icon" />
                           
                        </button>
                    </div> 

                    <div class="w-full p-3 mt-8 bg-white rounded flex">
                        <div tabindex="0" aria-label="heart icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg2.svg"  alt="icon"/>
                           
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">James Doe</span> favourited an <span class="text-indigo-700">item</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-white rounded shadow flex flex-shrink-0">
                        <div tabindex="0" aria-label="group icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex flex-shrink-0 items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg3.svg"  alt="icon"/>
                            
                        </div>
                        <div class="pl-3 w-full">
                            <div class="flex items-center justify-between w-full">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sash</span> added you to the group: <span class="text-indigo-700">UX Designers</span></p>
                                <div tabindex="0" aria-label="close icon" role="button" class="focus:outline-none cursor-pointer">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg4.svg"  alt="icon"/>
                                   
                                </div>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-white rounded flex">
                        <div tabindex="0" aria-label="post icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg5.svg"  alt="icon"/>
                          
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sarah</span> posted in the thread: <span class="text-indigo-700">Update gone wrong</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-red-100 rounded flex items-center">
                        <div tabindex="0" aria-label="storage icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-red-200 flex items-center flex-shrink-0 justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg6.svg"  alt="icon"/>
                          
                        </div>
                        <div class="pl-3 w-full flex items-center justify-between">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none text-red-700">Low on storage: 2.5/32gb remaining</p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 cursor-pointer underline text-right text-red-700">Manage</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-white rounded flex">
                        <div tabindex="0" aria-label="loading icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg7.svg"  alt="icon"/>
                          
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none">Shipmet delayed for order<span class="text-indigo-700"> #25551</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <h2 tabindex="0" class="focus:outline-none text-sm leading-normal pt-8 border-b pb-2 border-gray-300 text-gray-600">YESTERDAY</h2>
                    <div class="w-full p-3 mt-6 bg-white rounded flex">
                        <div tabindex="0" aria-label="post icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg8.svg"  alt="icon"/>
                           
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">Sarah</span> posted in the thread: <span class="text-indigo-700">Update gone wrong</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-white rounded flex">
                        <div tabindex="0" aria-label="loading icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg9.svg"  alt="icon"/>
                          
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none">Shipmet delayed for order<span class="text-indigo-700"> #25551</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-4 bg-white rounded flex">
                        <div tabindex="0" aria-label="heart icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg10.svg"  alt="icon"/>
                           
                        </div>
                        <div class="pl-3">
                            <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">James Doe</span> favourited an <span class="text-indigo-700">item</span></p>
                            <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="w-full p-3 mt-8 bg-green-100 rounded flex items-center">
                        <div tabindex="0" aria-label="success icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-green-200 flex flex-shrink-0 items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg11.svg"  alt="icon"/>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="flex items-center justify-between">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none text-green-700">Design sprint completed</p>
                                <p tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">View</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justiyf-between">
                        <hr class="w-full">
                        <p tabindex="0" class="focus:outline-none text-sm flex flex-shrink-0 leading-normal px-3 py-16 text-gray-500">Thats it for now :)</p>
                        <hr class="w-full">
                    </div>
                </div>
            
        </div> -->

            <!-- notification -->
</div>




       
        
        
    