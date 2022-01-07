<div>
        <!-- Header -->
        <div class="relative bg-blueGray-50">
        
        <!-- Header -->
        
        <div class="relative bg-blue-900 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
             
            </div>
          </div>
        </div>
        
        <div class="px-4 md:px-10 mx-auto w-full " style="margin-top: -160px" >
      
          <div class="flex flex-wrap">
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                       Learning Progress
                    </h6>
                   
                  </div>
                </div>
                 <!-- chart -->
                 <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                        <livewire:livewire-pie-chart
                            key="{{ $pieChartModel->reactiveKey() }}"
                            :pie-chart-model="$pieChartModel"
                        />

                        </div>

                      
                    </div>

                  
                </div>
                <!-- /chart -->
              </div>
            </div>

            
          </div>
          </form>
        </div>
      </div>
            <!-- Bar chart -->
            <!-- <div class="w-full xl:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
              >
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                      <h6
                        class="uppercase text-blueGray-400 mb-1 text-xs font-semibold"
                      >
                        Performance
                      </h6>
                      <h2 class="text-blueGray-700 text-xl font-semibold">
                        Total orders
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="p-4 flex-auto">
                 
                  <div class="relative h-350-px">
                    <canvas id="bar-chart"></canvas>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- bar chart -->
          </div>
        
        </div>
      </div>
    </div>
</div>

    
   
  
