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
                          Tambah Distributor
                        </button>
                        @endif
                      @endauth
                      <div class="flex items-center space-x-3 w-full md:w-auto">
                         
                      </div>
                  </div>
              </div>
              <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">No</th>
                              <th scope="col" class="px-4 py-3">Code</th>
                              <th scope="col" class="px-4 py-3">Name</th>
                              <th scope="col" class="px-4 py-3">Contact</th>
                              <th scope="col" class="px-4 py-3">City</th>
                              <th scope="col" class="px-4 py-3">Province</th>
                              {{-- <th scope="col" class="px-4 py-3">Is Active</th> --}}
                              <th scope="col" class="px-4 py-3">Address</th>
                              {{-- <th scope="col" class="px-4 py-3">Created at</th>
                              <th scope="col" class="px-4 py-3">Updated at</th> --}}
                              <th scope="col" class="px-4 py-3">
                                  <span class="sr-only">Actions</span>
                              </th>
                          </tr>
                      </thead>
                      @php
                          $no = 0;
                      @endphp
                      <tbody id="myTable">
                        @foreach ($distributors as $distri)
                        @if($distri->is_active == 0)

                        @else
                          @php
                              $no++;
                          @endphp
                          <tr id="index_{{ $distri->id }}">
                          <tr class="border-b dark:border-gray-700">
                              <td class="px-4 py-3">{{ $no }}</td>
                              <td class="px-4 py-3">{{ $distri->code }}</td>
                              <td class="px-4 py-3">{{ $distri->name }}</td>
                              <td class="px-4 py-3"> 
                                <a href="https://wa.me/{{$distri->country_code}}{{$distri->contact}}">
                                  <div class="flex items-center">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 448 512"
                                    height="25px" width="25px">
                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path
                                      d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                  </svg>
                                  {{$distri->country_code}} {{ $distri->contact }}
                                </div>
                              </a>
                              </td>
                              <td class="px-4 py-3">{{ $distri->city->name }}</td>
                              <td class="px-4 py-3">{{ $distri->province->name }}</td>
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
                              <td class="px-4 py-3">{{ strlen($distri->address) > 50 ? substr($distri->address, 0, 50) . '...' : $distri->address }}</td>
                              {{-- <td class="px-4 py-3">{{ $distri->created_at }}</td>
                              <td class="px-4 py-3">{{ $distri->updated_at }}</td> --}}
                              <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                  {{-- delete admin --}}
                                  @auth
                                  @if(auth()->user()->role == 'super admin')
                                  <button class="deleteModalSuper" id="deleteModalSuper" data-modal-target="delete-modal-super" data-modal-toggle="delete-modal-super" value="{{ $distri->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                    </svg>                                    
                                  </button>
                                  @endif
                                @endauth
                                  {{-- end delete --}}

                                  {{-- delete --}}
                                  @auth
                                  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super admin')
                                  <button class="deleteModal" id="deleteModal" data-modal-target="delete-modal" data-modal-toggle="delete-modal" value="{{ $distri->id }}">
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

                                  <button class="editModal" data-modal-target="edit-modal" data-modal-toggle="edit-modal" id="btn-edit-post" value="{{ $distri->id }}">
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
                                  @endif
                                @endauth
                                  {{-- endedit --}}
                                
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
  @include('Distributor.distributorCreate')
  @include('Distributor.distributorEdit')
  @include('Distributor.distributorDelete')
  @include('Distributor.distributorDeleteSuper')
  @include('Distributor.distributorPopup')
 

</x-dashboard-layout>

<script>
  // show delete super
  $(document).ready(function () {
    $(document).on('click', '#deleteModalSuper', function(){
      var id = $(this).val();
      var name = $("#name").val();
      var code = $("#code").val();
      console.log(id);
      $.ajax({
        type: "GET",
        url: "/distributor/" +id ,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#name_delete_super').html(response.data.name);
          $('#code_delete_super').html(response.data.code);
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
      var name = $("#name_delete_super").html();
      var code = $("#code_delete_super").html();
      console.log(id);
      var formData = {
        id : $("#id_delete_super").val(),
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/distributor/" + id,
        type: "DELETE",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Distributor Name : " + name + " and Code: " + code +" delete successfully.";
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
  // show delete is_active = 0
  $(document).ready(function () {
    $(document).on('click', '#deleteModal', function(){
      var id = $(this).val();
      var code = $("#code").val();
      var name = $("#name").val();
      var country_code = $("#country_code").val();
      var contact = $("#contact").val();
      var city_id = $("#city_id").val();
      var province_id = $("#province_id").val();
      var address = $("#address").val();
      
      console.log(code);
      console.log(name);
      $.ajax({
        type: "GET",
        url: "/distributor/" +id,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#code_delete').html(response.data.code);
          $('#name_delete').html(response.data.name);
          $("#country_code_delete").val(response.data.country_code);
          $("#contact_delete").val(response.data.contact);
          $("#city_id_delete").val(response.data.city_id);
          $("#province_id_delete").val(response.data.province_id);
          $("#address_delete").val(response.data.address);
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
      var code = $("#code_delete").html();
      var name = $("#name_delete").html();
      
      var is_active1 = 0;
      console.log(id);
      var formData = {
        id : $("#id_delete").val(),
        code : $("#code_delete").html(),
        name : $("#name_delete").html(),
        country_code : $("#country_code_delete").val(),
        contact : $("#contact_delete").val(),
        city_id : $("#city_id_delete").val(),
        province_id : $("#province_id_delete").val(),
        is_active : is_active1,
        address : $("#address_delete").val(),
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/distributor/" + id,
        type: "PUT",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Distributor code : " + code + " and name: " + name +" delete successfully.";
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
          url: "/distributor/" +id,
          cache: false,
          success: function(response){
            // console.log(response.distributor.code);
            $('#code').val(response.data.code);
            $('#name').val(response.data.name);
            $('#country_code').val(response.data.country_code);
            $('#contact').val(response.data.contact);
            // Set selected city
            $('#city_id1').val(response.data.city_id);

            // Set selected province
            $('#province_id1').val(response.data.province_id);

            // Trigger change event for dynamic dropdowns
            $('#city_id1').trigger('change');
            $('#province_id1').trigger('change');
            $('#is_active').val(response.data.is_active);
            $('#address').val(response.data.address);
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
      code : $("#code").val(),
      name : $("#name").val(),
      country_code : $("#country_code").val(),
      contact : $("#contact").val(),
      city_id : $("#city_id1").val(),
      province_id : $("#province_id1").val(),
      is_active : $("#is_active").val(),
      address : $("#address").val(),
    };
    console.log(is_active);
   
    $.ajax({
      type: "PUT",
      url: "/distributor/" + id,
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
