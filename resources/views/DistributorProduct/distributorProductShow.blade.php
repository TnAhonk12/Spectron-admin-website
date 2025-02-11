<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <section  class="overflow-hidden rounded-lg shadow-2xl md:grid md:grid-cols-1">
                   
                    <div id="qr_show" style="display: grid; place-items: center;"></div>
                    <div style="text-align: left;" class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                      {{-- <p class="text-sm font-semibold uppercase tracking-widest">Name</p>
                      <p class="text-4xl font-black sm:text-xl lg:text-64xl" id="name_show"></p> --}}
                  
                      <h2 class="font-black " >
                          <span class="mt-2 block text-sm uppercase" >Nama Distributor</span>
                          
                          <span class="text-4xl font-black" id="distributor_show"> </span>
                        </h2>
                        <h2 class="mt-6 font-black" >
                        <span class="mt-2 block text-sm uppercase">Nama Product</span>
                        <span class="text-4xl font-black" id="product_show"> </span>
                    </h2>
                  
                    </div>
                  </section>
                  
        </div>
    </div>
</div>