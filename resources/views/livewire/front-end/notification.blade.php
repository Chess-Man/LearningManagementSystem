<div>
   <!-- profile dialog -->
<div class="relative bg-blueGray-50">
        
        <!-- Header -->
        
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
             
            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-10 mx-auto w-full " style="margin-top: -160px">
      
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                      Notifications
                    </h6>
                    <button
                      wire:click.defer="MarkAllAsRead"
                      class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      role="button"
                    >
                      Mark all as read
                    </button>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  
                <div class="w-full  h-full overflow-x-hidden " id="notification">
               
               @forelse ($notifications as $notification)
   
                       <div class="w-full p-2 mt-4  rounded flex items-center  @if($notification->read_at === null) bg-green-100 @else bg-gray-200  @endif">
                           <div tabindex="0" aria-label="success icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-blue-200 flex flex-shrink-0 items-center justify-center">
                               <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg11.svg"  alt="icon"/>
                           </div>
                           <div class="pl-3 w-full">
                               <div class="flex items-center justify-between capitalize">
                                   <p tabindex="0" class="focus:outline-none text-sm leading-none  @if($notification->read_at === null) text-blue-700 @else text-gray-700  @endif ">{{ $notification->data['name']}} </p>
                                   @if($notification->read_at === null)
                                   <p wire:click.defer="read({{ $notification  }})" tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">Mark as Read</p>
                                   @else
                                   <p wire:click.defer="unread({{ $notification  }})" tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">Mark as Unread</p>
                                   @endif
                               </div>
                           </div>
                       </div>
           
               @empty
                   <div class="text-sm text-gray-700 pt-4">
                       No data found
                   </div>
               @endforelse
                    
               </div>  
  
                </div>
              </div>
            </div>

            
          </div>
    
        </div>
      </div>
</div>
