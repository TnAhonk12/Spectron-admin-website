<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                {{-- <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold " id="name_show">
                            Apple iMac 27”
                        </h3>
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500" id="photo_show"></div>
                </div>
                
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Details</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="name_show"></dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Weight</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="weight_show"></dd>
                </dl>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                       
                    </div>              
                    
                </div> --}}
                <section  class="overflow-hidden rounded-lg shadow-2xl md:grid md:grid-cols-1">
                   
                    <div id="photo_show"></div>
                    <div style="text-align: left;" class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                      {{-- <p class="text-sm font-semibold uppercase tracking-widest">Name</p>
                      <p class="text-4xl font-black sm:text-xl lg:text-64xl" id="name_show"></p> --}}
                  
                      <h2 class="font-black " >
                          <span class="mt-2 block text-sm uppercase" >Name</span>
                          
                          <span class="text-4xl font-black" id="name_show"> </span>
                        </h2>
                        <h2 class="mt-6 font-black" >
                        <span class="mt-2 block text-sm uppercase">Weight</span>
                        <span class="text-4xl font-black" id="weight_show"> </span>
                    </h2>
                        <h2 class="mt-6 font-black" >
                        <span class="mt-2 block text-sm uppercase">Serial Number</span>
                        <span class="text-4xl font-black" id="serial_number"> </span>
                    </h2>
                    {{-- <span class="text-4xl font-black sm:text-5xl lg:text-6xl"> Get 20% off </span>
              
                    <span class="mt-2 block text-sm">On your next order over $50</span> --}}
                  
                      {{-- <a
                        class="mt-8 inline-block w-full bg-black py-4 text-sm font-bold uppercase tracking-widest text-white"
                        href="#"
                      >
                        Get Discount
                      </a> --}}
                  
                      {{-- <p class="mt-8 text-xs font-medium uppercase text-gray-400">
                        Offer valid until 24th March, 2021 *
                      </p> --}}
                    </div>
                  </section>
                  
        </div>
    </div>
</div>