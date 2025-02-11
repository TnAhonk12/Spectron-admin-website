<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <!-- component -->
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
          Tambah Product
        </button>
        @endif
      @endauth
      <div class="flex items-center space-x-4 w-full md:w-auto">
         
      </div>
  </div>
  </div>
<div class="overflow-auto rounded-lg border border-gray-200 shadow-md m-5"> 
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Photo</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Serial Number</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Weight</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
      </thead>
        @php
          $no = 0;
        @endphp
      <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="myTable">
        @foreach ($products as $prod)
          @if($prod->is_active == 0)

          @else
          @php
              $no++;
          @endphp
        <tr class="hover:bg-gray-50">
          <tr id="index_{{ $prod->id }}">
          <td class="px-6 py-4">{{ $no }}</td>
          <td class="px-6 py-4">{{ $prod->name }}</td>
          {{-- end --}}
          
          {{-- column photo --}}
          <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
            <div class="relative h-10 w-10">
              <img
              class="h-full w-full rounded-full object-cover object-center"
              src="{{ asset('storage/Products/'.$prod->photo) }}" 
              alt=""
              />
            </div>
            <div class="text-gray">{{$prod->photo_original}}</div>
            
          </th>
          {{-- end --}}
          
          {{-- column weight --}}
          <td class="px-6 py-4">
            {{ $prod->serial_number }}
          </td>
          <td class="px-6 py-4">
            {{ $prod->weight }} Kg
          </td>
          {{-- end --}}
          
          <td class="px-6 py-4">
            <div class="flex justify-end gap-4">
              {{-- Lihat photo --}}
              <button id="readProductButton" data-modal-target="readProductModal" data-modal-toggle="readProductModal" value="{{ $prod->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>                
              </button>

              @auth
              @if(auth()->user()->role == 'super admin')
              <button class="deleteModalSuper" id="deleteModalSuper" data-modal-target="delete-modal-super" data-modal-toggle="delete-modal-super" value="{{ $prod->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                </svg>                                    
              </button>
              @endif
            @endauth
              
              @auth
              @if(auth()->user()->role == 'admin'|| auth()->user()->role == 'super admin')
              {{-- ganti is_active jadi 0 --}}
              <button class="deleteModal" id="deleteModal" data-modal-target="delete-modal" data-modal-toggle="delete-modal" value="{{ $prod->id }}">
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
              @endif
              @endauth

              {{-- tombol edit --}}
              @auth
              @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super admin')
              <a href="{{ route('product.edit', $prod->id) }}">
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
              </a>
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
  
  </div>
  @include('Product.productCreate')
  @include('Product.productDelete')
  @include('Product.productDeleteSuper')
  @include('Product.productPopup')
  @include('Product.productShow')
  {{-- @include('Product.productEdit') --}}
</x-dashboard-layout>
<script>
// show delete super
$(document).ready(function () {
    $(document).on('click', '#deleteModalSuper', function(){
      var id = $(this).val();
      var name = $("#name").val();
      var serial_number = $("#serial_number").val();
      console.log(id);
      $.ajax({
        type: "GET",
        url: "/product/" +id ,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#name_delete_super').html(response.data.name);
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
      var name = $("#name_delete_super").html();
      var serial_number = $("#serial_number_delete_super").html();
      console.log(id);
      var formData = {
        id : $("#id_delete_super").val(),
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/product/" + id,
        type: "DELETE",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Product Name : " + name + " and serial number: " + serial_number +" delete successfully.";
            // response.message = "Distributor delete successfully.";
            header = "Delete Success!";

            // Call the function to display the notification and refresh the page
            successFunction1(response,header);

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

//show foto
$(document).ready(function () {
    $(document).on('click', '#readProductButton', function(){
      var id = $(this).val();
      var name = $("#name").val();
      var weight = $("#weight").val();
      var serial_number = $("#serial_number").val();
      var photo = $("#photo").val();
      var photo_original = $("#photo_original").val();
      
      $.ajax({
        type: "GET",
        url: "/product/" +id,
        cache: false,
        enctype: 'multipart/form-data',
        success: function(response){
          $('#name_show').html(response.data.name);
          $('#serial_number').html(response.data.serial_number);
          $("#weight_show").html(response.data.weight + ' Kg');
          $("#photo_show").html('<img class="h-32 w-68 object-cover md:h-full" src="/storage/Products/' + response.data.photo + '" alt="' + response.data.photo_original + '">');
        }
      });
    });
});


  // show delete
  $(document).ready(function () {
    $(document).on('click', '#deleteModal', function(){
      var id = $(this).val();
      var name = $("#name").val();
      var serial_number = $("#serial_number").val();
      var weight = $("#weight").val();
      
      // console.log(serial_number);
      // console.log(name);
      $.ajax({
        type: "GET",
        url: "/product/" +id,
        cache: false,
        success: function(response){
          // console.log(response.distributor.code);
          $('#name_delete').html(response.data.name);
          $("#weight_delete").val(response.data.weight);
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
      var name = $("#name_delete").html();
      
      var is_active1 = 0;
      console.log(id);
      var formData = {
        id : $("#id_delete").val(),
     
        name : $("#name_delete").html(),
        weight : $("#weight_delete").val(),
        is_active : is_active1,
        _token : $('meta[name="csrf-token"]').attr('content'),
      };
      // console.log(is_active);
      $.ajax({
        url: "/productDetelete/" + id,
        type: "PUT",
        cache: false,
        data: formData,
        success: function(response) {
            console.log(response);

            response.message = "Product name: " + name +" delete successfully.";
            // response.message = "Distributor delete successfully.";
            header = "Delete Success!";

            // Call the function to display the notification and refresh the page
            successFunction1(response,header);

        },
        error: function(err) {
            console.log(err);
            // Show an error notification
            $("#headerAlert").text("Error!");
            $("#messageAlert").text("Error deleting product.");
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
          url: "/product/" +id,
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          cache: false,
          success: function(response){
            console.log(response.data.photo);
            $('#name_edit').val(response.data.name);
            $("#weight_edit").val(response.data.weight);
            $("#is_active_edit").val(response.data.is_active);
            $("#photo_edit").html('<img width="100" src="/storage/Products/' + response.data.photo + '" alt="' + response.data.photo_original + '">');
            $('#id').val(id);
            
          }
        })
      })
  });

 //update ??
 $(document).ready(function () {
    $("#updateButton").click(function (e) {
        e.preventDefault();
        var id = $("#id").val();
        var formData = new FormData(); // Create FormData object
        formData.append('id', $("#id").val());
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('name', $("#name_edit").val());
        formData.append('weight', $("#weight_edit").val());
        formData.append('is_active', $("#is_active_edit").val());
        // Append the file input to FormData
        formData.append('photo', $("#photo")[0].files[0]);
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
            type: "PUT", // Change to POST if you're creating a new resource
            url: "/product/" + id, // Change the URL endpoint accordingly
            data: formData,
            contentType: false, // Set contentType to false when using FormData
            processData: false, // Set processData to false when using FormData
            success: function(response) {
                console.log(response);
                response.message = "Product updated successfully.";
                header = "Update Success!";
                // Call the function to display the notification and refresh the page
                successFunction1(response, header);
            },
            error: function(err) {
                console.log(err);
                // Show an error notification
                $("#headerAlert").text("Error!");
                $("#messageAlert").text("Error updating product.");
                $("#notification-container").fadeIn();
            }
        });
    });
});

function successFunction1(response,header) {
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

  
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', function (event) {
            const input = document.querySelector('input[type="file"]');
            if (input.files.length > 0) {
                const fileSize = input.files[0].size / 1024; // Mengonversi ukuran file ke KB
                if (fileSize > 500) {
                    alert('Ukuran file photo melebihi 500KB. Silakan pilih file yang lebih kecil.');
                    event.preventDefault(); // Mencegah pengiriman form jika ukuran file melebihi 500KB
                }
            }
        });
    });

</script>
