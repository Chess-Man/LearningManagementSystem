<div>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>

            <div class="w-full  h-full overflow-x-hidden " id="notification">
               
            @forelse ($notifications as $notification)

                    <div class="w-full p-2 mt-4 bg-green-100 rounded flex items-center">
                        <div tabindex="0" aria-label="success icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-green-200 flex flex-shrink-0 items-center justify-center">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/notification_1-svg11.svg"  alt="icon"/>
                        </div>
                        <div class="pl-3 w-full">
                            <div class="flex items-center justify-between">
                                <p tabindex="0" class="focus:outline-none text-sm leading-none text-green-700">{{ $notification->data['name']}} </p>
                                @if($notification->read_at === null)
                                <p wire:click.defer="read({{ $notification  }})" tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">Mark as Read</p>
                                @else
                                <p wire:click.defer="unread({{ $notification  }})" tabindex="0" class="focus:outline-none focus:text-indigo-600 text-xs leading-3 underline cursor-pointer text-green-700">Mark as Unread</p>
                                @endif
                            </div>
                        </div>
                    </div>
        
            @empty
                <div class="px-6 py-4 text-md font-medium text-gray-700 ">
                    No data found
                </div>
            @endforelse
                  <div wire:click.defer="MarkAllAsRead" class="text-indigo-800 pt-2  cursor-pointer">Mark all as read  </div>
            </div>    

</div>




       
        
        
    