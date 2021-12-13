<div>
        <h2 class="font-semibold text-xl mb-8 text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>

    <!-- Start -->
    <div class=" sm:mt-0 font-serif">
            <div class="md:grid md:grid-cols-2 md:gap-4">
                <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-2xl font-black leading-6 text-gray-900 font-serif"> {{  $task_student->task->name }}  </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Due {{ \Carbon\Carbon::parse($task_student->task->deadline )->format('d/m/Y H:i')}} 
                    </p>

                    <p class="mt-1 text-md text-gray-900 pt-3 font-serif">
                        Instructions
                    </p>

                    <p class="mt-1 text-sm text-gray-800 pt-2">
                        {{ $task_student->task->instruction }}
                    </p>

                    <p class="mt-1 text-md text-gray-900 pt-3 font-serif">
                        Points
                    </p>

                    <p class="mt-1 text-sm text-gray-800 ">
                    {{ optional($task_student->files_submited)->points}} / {{ $task_student->task->points }}
                    </p>

                </div>
                </div>
                <form action="#" wire:submit.prevent="create">
                  <div class="mt-5 md:mt-0 md:col-span-1 ">
                      <div class="overflow-hidden sm:rounded-md">
                      <div class="px-4 py-5 bg-white sm:p-6">
                  
                          <div class="grid grid-cols-6 gap-4">

                          <div class="col-span-8 sm:col-span-3 "  
                                x-data="{ isUploading: false, progress: 0 }" 
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false" 
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">

                            <label class="text-sm font-medium text-gray-900 block mb-2" for="user_avatar">Upload Your Work</label>
                            <input class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg @error('file_path') border-red-500 @enderror" id="user_avatar" type="file"  wire:model="file_path">
                              <div class="mt-2 " x-show="isUploading">
                                  <progress max="100" x-bind:value="progress"></progress>
                              </div>
                            @error('file_path')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                              {{ $message }}
                            </span>
                            @enderror
                          </div>

                        

                        
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
                          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                              @if($task_student->task->deadline < now())
                                <span>Submit Late</span>
                              @else
                                <span>Submit </span>
                              @endif
                        </button>
                      </div>

                      <div class="col-span-8 sm:col-span-6">
                      <div class="text-sm font-medium text-gray-900 block mb-2  ">Your Work</div>
                       
                        <div class="mt-1 text-sm text-gray-800 ">  
                          {{ optional($task_student->files_submited)->file_path }}
                          @if($file_count === true)
                          <p wire:click="remove({{$task_student->files_submited->id}})" class="block text-sm text-red-800 cursor-pointer ">Remove</p>
                          @else
                           None
                          @endif
                          <div>
      
                      </div>

                      </div>
                  </div>
                </form>
            </div>
        </div>

    <!-- End -->
</div>
