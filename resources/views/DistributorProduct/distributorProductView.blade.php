<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
          <!-- Start coding here -->
          <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
              <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                  <div class="w-full md:w-1/2">
                      <form class="flex items-center">
                          <label for="simple-search" class="sr-only">Search</label>
                          <div class="relative w-full">
                              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                  </svg>
                              </div>
                              <input type="text" id="myInput" onkeyup="myFunction()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                          </div>
                      </form>
                  </div>
                  <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    @auth
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super admin')
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-blue rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                          </svg>
                          Tambah Stock
                        </button>
                        @endif
                        @endauth 
                      <div class="flex items-center space-x-3 w-full md:w-auto">
                         
                      </div>
                  </div>
              </div>
              <div id="rowCount"></div>
              <div class="overflow-x-auto">
                <div id="rowCount" class="mb-4"></div> 
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">No</th>
                              <th scope="col" class="px-4 py-3">Distributor</th>
                              <th scope="col" class="px-4 py-3">Product</th>
                              <th scope="col" class="px-4 py-3">Serial Number</th>
                              <th scope="col" class="px-4 py-3">
                                  <span class="sr-only">Actions</span>
                              </th>
                          </tr>
                      </thead>
                      @php
                          $no = 0;
                       
                      @endphp
                      <tbody id="myTable">
                        @foreach ($distributor_products as $stock)
                        @if($stock->is_active == 0)

                        @else
                          @php
                              $no++;
                              $isInactive_distri = $stock->distributors->is_active == 0;
                              $isInactive_prod = $stock->products->is_active == 0;
                          @endphp
                          <input type="hidden" id="distributor_id" value="{{ $stock->distributors->name }}">
                          <input type="hidden" id="product_id" value="{{ $stock->products->name }}">
                          {{-- <tr id="index_{{ $stock->id }}"> --}}
                          <tr class="border-b dark:border-gray-700">
                              <td class="px-4 py-3">{{ $no }}</td>
                              <td class="px-4 py-3">{{ $stock->distributors->name }}
                                @if($isInactive_distri)
                                  <span class="ml-2 px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Inactive</span>
                                @endif
                              </td>
                              
                              <td class="px-4 py-3">{{ $stock->products->name }}
                                @if($isInactive_prod)
                                <span class="ml-2 px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Inactive</span>
                              @endif
                              </td>

                              {{-- <td class="px-4 py-3">
                              
                                <span class="{{ $distri->is_active == 1 ? 'inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600' : 'inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600' }}">
                                  <a>
                                      <span class="{{ $distri->is_active == 1 ? 'h-1.5 w-1.5 rounded-full bg-green-600' : 'h-1.5 w-1.5 rounded-full bg-red-600' }}"></span>
                                      {{ $distri->is_active == 1 ? 'True' : 'False' }}
                                      </span>
                                  </a>
                              </span>
                              </td> --}}
                              {{-- <td class="px-4 py-3" style="display: none;">
                                
                                <span class="{{ $distri->is_active == 1 ? 'inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600' : 'inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600' }}">
                                  <a>
                                      <span class="{{ $distri->is_active == 1 ? 'h-1.5 w-1.5 rounded-full bg-green-600' : 'h-1.5 w-1.5 rounded-full bg-red-600' }}"></span>
                                      {{ $distri->is_active == 1 ? 'True' : 'False' }}
                                      </span>
                                  </a>
                              </span>
                              </td> --}}
                              <td class="px-4 py-3">{{ $stock->serial_number }}</td>
                              <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                  <button id="readProductButton" data-modal-target="readProductModal" data-modal-toggle="readProductModal" value="{{ $stock->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                      <path fill-rule="evenodd" d="M3 4.875C3 3.839 3.84 3 4.875 3h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 9.375v-4.5ZM4.875 4.5a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875.375c0-1.036.84-1.875 1.875-1.875h4.5C20.16 3 21 3.84 21 4.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5a1.875 1.875 0 0 1-1.875-1.875v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75A.75.75 0 0 1 6 7.5v-.75Zm9.75 0A.75.75 0 0 1 16.5 6h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM3 14.625c0-1.036.84-1.875 1.875-1.875h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.035-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 0 1 3 19.125v-4.5Zm1.875-.375a.375.375 0 0 0-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 0 0 .375-.375v-4.5a.375.375 0 0 0-.375-.375h-4.5Zm7.875-.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75ZM6 16.5a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm9.75 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm-3 3a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Zm6 0a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75Z" clip-rule="evenodd" />
                                    </svg>                                                
                                  </button>

                                  @auth
                                  @if(auth()->user()->role == 'super admin')
                                  <button class="deleteModalSuper" id="deleteModalSuper" data-modal-target="delete-modal-super" data-modal-toggle="delete-modal-super" value="{{ $stock->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                    </svg>                                    
                                  </button>
                                  @endif
                                @endauth
                                  {{-- delete --}}
                                  @auth
                                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super admin')
                                  <button class="deleteModal" id="deleteModal" data-modal-target="delete-modal" data-modal-toggle="delete-modal" value="{{ $stock->id }}">
                                    <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      class="h-6 w-6"
                                      x-tooltip="tooltip"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                      />
                                    </svg>
                                  </button>
                                  
                                  {{-- end delete --}}

                                  {{-- Edit --}}
                                  <button class="editModal" data-modal-target="edit-modal" data-modal-toggle="edit-modal" id="btn-edit-post" value="{{ $stock->id }}">
                                    <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke-width="1.5"
                                      stroke="currentColor"
                                      class="h-6 w-6"
                                      x-tooltip="tooltip"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                      />
                                    </svg>
                                  </button>
                                  {{-- endedit --}}
                                  @endif
                                  @endauth
                                </div>
                              </td>
                          </tr>
                          @endif
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                  
              </nav>
          </div> 
          @include('DistributorProduct.distributorProductCreate')
          @include('DistributorProduct.distributorProductDelete')
          @include('DistributorProduct.distributorProductDeleteSuper')
          @include('DistributorProduct.distributorProductPopup')
          @include('DistributorProduct.distributorProductEdit')
          @include('DistributorProduct.distributorProductShow')
        </x-dashboard-layout>

<script>
  $(document).ready(function () {
    // Count the number of rows in the table
    var rowCount = $("#myTable tr").length;

    // Display the row count above the table
    $("#rowCount").html("<p class='text-gray-500'> Total Serial Number :  " + rowCount + "</p>");
  });

  // show delete super
  $(document).ready(function () {
    $(document).on('click', '#deleteModalSuper', function(){
      var id = $(this).val();
      var serial_number = $("#serial_number").val();
      var product_id = $("#product_id").val();
      console.log(id);
      $.ajax({
        type: "GET",
        url: "/distributor_product/" +id ,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#product_id_delete_super').html(product_id);
          $('#serial_number_delete_super').html(response.data.serial_number);
          $('#id_delete_super').val(id);
        }
      })
    })
  });

  // destroy super
  $(document).ready(function () {
    $("#deleteButtonSuper").click(function (e) {
      e.preventDefault();
      var id = $("#id_delete_super").val();
      var serial_number = $("#serial_number_delete_super").html();
      var product_id = $("#product_id_delete_super").html();
      console.log(id);
      var formData = {
        id : $("#id_delete_super").val(),
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/distributor_product/" + id,
        type: "DELETE",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Stock Product Name : " + product_id + " and Serial Number: " + serial_number +" delete PERMANEN successfully.";
            // response.message = "Distributor delete successfully.";
            header = "Delete Success!";

            // Call the function to display the notification and refresh the page
            successFunction(response,header);

        },
        error: function(err) {
            console.log(err);
            // Show an error notification
            $("#headerAlert").text("Error!");
            $("#messageAlert").text("Error deleting distributor.");
            $("#notification-container").fadeIn();
        }
    });
    });
  });
  //show
  $(document).ready(function () {
    $(document).on('click', '#readProductButton', function(){
        var id = $(this).val();
        var distributor_id = $("#distributor_id").val();
        var product_id = $("#product_id").val();
        console.log(distributor_id);
        console.log(product_id);
        
        $.ajax({
            type: "GET",
            url: "/distributor_product/" + id + "/qr-code", // Define the route to generate QR code
            cache: false,
            success: function(response){
                $('#distributor_show').html(response.distributor_name);
                $("#product_show").html(response.product_name);
                $("#qr_show").html('<img class="h-32 w-68 object-cover md:h-full" src="data:image/png;base64,' + response.qr_code + '">');
                console.log(response.qr_code);
            }
        });
    });
});


 // show delete
 $(document).ready(function () {
    $(document).on('click', '#deleteModal', function(){
      var id = $(this).val();
      var distributor_id = $("#distributor_id").val();
      var product_id = $("#product_id").val();
      console.log(distributor_id);
      console.log(product_id);
      $.ajax({
        type: "GET",
        url: "/distributor_product/" +id,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#distributor_id_delete').html(distributor_id);
          $('#product_id_delete').html(product_id);
          $('#id_distributor').html(response.data.distributor_id);
          $('#id_product').html(response.data.distributor_id);
          $('#id_delete').val(id);
        }
      })
    })
  });

   // destroy
   $(document).ready(function () {
    $("#deleteButton").click(function (e) {
      e.preventDefault();
      var id = $("#id_delete").val();
      var distributor_id = $("#distributor_id_delete").html();
      var product_id = $("#product_id_delete").html();
      
      var is_active1 = 0;
      console.log(id);
      var formData = {
        id : $("#id_delete").val(),
        distributor_id : $("#id_distributor").html(),
        product_id : $("#id_product").html(),
        is_active : is_active1,
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/distributor_product/" + id,
        type: "PUT",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Distributor code : " + distributor_id + " and Product id: " + product_id +" delete successfully.";
            // response.message = "Distributor delete successfully.";
            header = "Delete Success!";

            // Call the function to display the notification and refresh the page
            successFunction(response,header);

        },
        error: function(err) {
            console.log(err);
            // Show an error notification
            $("#headerAlert").text("Error!");
            $("#messageAlert").text("Error deleting distributor.");
            $("#notification-container").fadeIn();
        }
    });
    });
  });

  //edit
  $(document).ready(function () {
      $(document).on('click', '.editModal', function(){
        var id = $(this).val();
        $.ajax({
          type: "GET",
          url: "/distributor_product/" +id,
          cache: false,
          success: function(response){
          
            // Set selected product
            $('#product_id1').val(response.data.product_id);

            // Set selected distributor
            $('#distributor_id1').val(response.data.distributor_id);

            // Trigger change event for dynamic dropdowns
            $('#product_id1').trigger('change');
            $('#distributor_id1').trigger('change');
            $('#is_active').val(response.data.is_active);
            $('#id').val(id);
          }
        })
      })
  });

  //update

  $(document).ready(function () {
  $("#updateButton").click(function (e) {
    e.preventDefault();
    var id = $("#id").val();
    var formData = {
      id :  $("#id").val(),
      _token : $('meta[name="csrf-token"]').attr('content'),
      product_id : $("#product_id1").val(),
      distributor_id : $("#distributor_id1").val(),
      is_active : $("#is_active").val(),
    };
    console.log(is_active);
   
    $.ajax({
      type: "PUT",
      url: "/distributor_product/" + id,
      data: formData,
      success: function(response) {
          console.log(response);

          response.message = "Distributor updated successfully.";
          header = "Update Success!";

          // Call the function to display the notification and refresh the page
          successFunction(response,header);

      },
      error: function(err) {
          console.log(err);
          // Show an error notification
          $("#headerAlert").text("Error!");
          $("#messageAlert").text("Error updating distributor.");
          $("#notification-container").fadeIn();
      }
   });

  });
});

  function successFunction(response,header) {
    // Show the notification
    $("#headerAlert").text(header);
    $("#messageAlert").text(response.message);
    $("#notification-container").fadeIn();

    //Refresh the page after 1 seconds
    setTimeout(function() {
      location.reload();
    }, 1000);
  }

     $(document).ready(function () {
      $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });
  });
</script>