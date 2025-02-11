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
                      <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-blue rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                          </svg>
                          Tambah User
                        </button>
                      <div class="flex items-center space-x-3 w-full md:w-auto">
                         
                      </div>
                  </div>
              </div>
              <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">No</th>
                              <th scope="col" class="px-4 py-3">Name</th>
                              <th scope="col" class="px-4 py-3">Username</th>
                              <th scope="col" class="px-4 py-3">Password</th>
                              <th scope="col" class="px-4 py-3">Role</th>
                              {{-- <th scope="col" class="px-4 py-3">Role</th> --}}
                              <th scope="col" class="px-4 py-3">
                                  <span class="sr-only">Actions</span>
                              </th>
                          </tr>
                      </thead>
                      @php
                          $no = 0;
                      @endphp
                      <tbody id="myTable">
                        @foreach ($admins as $admin)
                          @php
                              $no++;
                          @endphp
                          <tr class="border-b dark:border-gray-700">
                              <td class="px-4 py-3">{{ $no }}</td>
                              <td class="px-4 py-3">{{ $admin->name }}</td>
                              <td class="px-4 py-3">{{ $admin->username }}</td>
                              <td class="px-4 py-3">********</td>
                              <td class="px-4 py-3">{{ $admin->role }}</td>
                              <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                  {{-- delete --}}
                                  <button class="deleteModal" id="deleteModal" data-modal-target="delete-modal" data-modal-toggle="delete-modal" value="{{ $admin->id }}">
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
                                  <button class="editModal" data-modal-target="edit-modal" data-modal-toggle="edit-modal" id="btn-edit-post" value="{{ $admin->id }}">
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
                                
                                </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                  
              </nav>
          </div>    
 
          @include('Admin.adminCreate')
          @include('Admin.adminEdit')
          @include('Admin.adminPopup')
          @include('Admin.adminDelete')
</x-dashboard-layout>

<script>
  // show delete
  $(document).ready(function () {
    $(document).on('click', '#deleteModal', function(){
      var id = $(this).val();
      var username = $("#username").val();
      console.log(id);
      $.ajax({
        type: "GET",
        url: "/admin/" +id + "/edit",
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#username_delete').html(response.data.username);
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
      var username = $("#username_delete").html();
      var name = $("#name_delete").html();
      console.log(id);
      var formData = {
        id : $("#id_delete").val(),
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/admin/" + id,
        type: "DELETE",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "User Username : " + username + " and name: " + name +" delete successfully.";
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

  // show edit
  $(document).ready(function () {
      $(document).on('click', '.editModal', function(){
          var id = $(this).val();

          // Kirim AJAX request untuk mendapatkan data pengguna
          $.ajax({
              type: "GET",
              url: "/admin/" + id + "/edit",
              cache: false,
              success: function(response){
                // console.log(response.data);
                console.log(response.data.username);
                console.log(response.data.role);
                  // Isi nilai-nilai input dengan data pengguna yang sesuai
                  $('#username').val(response.data.username);
                  $('#name').val(response.data.name);
                  $('#role').val(response.data.role);
                  $('#role').trigger('change');
                  
                  // Set nilai id pengguna sebagai nilai dari input hidden id
                  $('#id').val(id);
              }
          });
      });
  });

  //update

  $(document).ready(function () {
  $("#updateButton").click(function (e) {
    e.preventDefault();
    var id = $("#id").val();
    var formData = {
      id :  $("#id").val(),
      _token : $('meta[name="csrf-token"]').attr('content'),
      username : $("#username").val(),
      password : $("#password").val(),
      name : $("#name").val(),
      role : $("#role").val(),
    };
    console.log(formData);
   
    $.ajax({
      type: "PUT",
      url: "/admin/" + id,
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

