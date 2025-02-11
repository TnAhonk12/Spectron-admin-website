<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white">
              <div class="card-body">
                <form action="" method="post">
                  @csrf
                  <textarea name="" class="textarea textarea-bordered w-full" placeholder="hey!" rows="3">

                  </textarea>
                  <h1></h1>
                  <input type="submit" value="Submit" class="btn btn-primary">
                </form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
