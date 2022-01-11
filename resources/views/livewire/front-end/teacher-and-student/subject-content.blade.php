<div>
<div class="relative bg-white" >
        
        <!-- Header -->
        
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
               

            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-10 mx-auto w-full b- " style="margin-top: -160px">
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
              <div class="rounded-t mb-0 px-4 py-3 border-0 bg-white">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-blueGray-700">
                      {{ $subjects->subject }}
                      </h3>  
                      <h3 class=" text-xs pb-5 text-blueGray-700">
                      {{ $subjects->description }}
                      </h3>  
                    </div>
                    
                    <div
                      class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
                    >
                    
                    <p class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-600">
                    {{ $subjects->code }}
                    </p>
                    
                </div>
                </div>
              
                <!-- Tab -->
                
                <div class="sm:hidden relative w-11/12 mx-auto bg-white rounded">
                        <!-- <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                           <img class="icon icon-tabler icon-tabler-selector" src="../svgs/white-bg-active-gray-svg1.svg" alt="selectors" />
                        </div> -->
                       
                    </div>
                    <div class="justify-between flex-wrap hidden sm:block bg-white shadow rounded">
                        <div class="xl:w-full xl:mx-0 -b pl-5 pr-5 h-12">
                            <ul class="flex items-center h-full">
                                <li  wire:click.defer="task" onkeypress="activeTab(this)" tabindex="0" onclick="activeTab(this)" class="focus:outline-none text-sm  py-2 px-4  rounded mr-8  font-normal cursor-pointer  @if($show === 'task') text-white  bg-indigo-600 hover:bg-indigo-700 @else text-gray-600 @endif">Task</li>
                                <li  wire:click.defer="file" onkeypress="activeTab(this)" tabindex="0" onclick="activeTab(this)" class="focus:outline-none text-sm rounded py-2 px-4 mr-10 font-normal cursor-pointer @if($show === 'file') text-white  bg-indigo-600 hover:bg-indigo-700 @else text-gray-600 @endif">File</li>
                                <li  wire:click.defer="quiz" onkeypress="activeTab(this)" tabindex="0" onclick="activeTab(this)" class="focus:outline-none text-sm rounded py-2 px-4 mr-10 font-normal cursor-pointer @if($show === 'quiz') text-white  bg-indigo-600 hover:bg-indigo-700 @else text-gray-600 @endif">Quiz</li>
                                @if(Auth::user()->hasRole('teacher'))
                                <li  wire:click.defer="student" onkeypress="activeTab(this)" tabindex="0" onclick="activeTab(this)" class="focus:outline-none text-sm rounded py-2 px-4 mr-10 font-normal cursor-pointer @if($show === 'student') text-white  bg-indigo-600 hover:bg-indigo-700 @else text-gray-600 @endif">Student</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                
                <!-- /tab -->
                <!-- End -->
              
                <!-- End -->
                <div class="flex-auto px-2 lg:px-10 py-10 pt-4 ">
                
                @if ($show === 'file')
                    <livewire:front-end.teacher-and-student.subject-files :subject="$subject"/>
                @elseif ($show === 'task')
                    <livewire:front-end.teacher-and-student.subject-task :subject="$subject"/>
                @elseif ($show === 'student')
                    <livewire:front-end.teacher-and-student.subject-student :subject="$subject"/>
                @elseif ($show === 'quiz')
                    <livewire:front-end.teacher-and-student.subject-quiz :subject="$subject"/>
               @endif
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
</div>
