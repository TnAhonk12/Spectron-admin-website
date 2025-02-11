<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Spectron Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/riva-dashboard-tailwind/riva-dashboard.css"> --}}

        

        {{-- <link rel="stylesheet" href="{{ asset('resources/css/tailwind_button.css') }}" /> --}}
        {{-- @vite(['resources/css/tailwind_button.css']); --}}
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            .font-family-karla { font-family: karla; }
            .bg-sidebar { background: #3d68ff; }
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: #1947ee; }
            .nav-item:hover { background: #1947ee; }
            .account-link:hover { background: #3d68ff; }
            .toggle-checkbox:checked {
                @apply: right-0 border-green-400;
                right: 0;
                border-color: #68D391;
            }
            .toggle-checkbox:checked + .toggle-label {
                @apply: bg-green-400;
                background-color: #68D391;
            }
        </style>

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="bg-gray-100 font-family-karla flex">

        <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
            <div class="p-6">
                <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Spectron</a>
                
            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="/dashboard" class="flex items-center {{ 'dashboard' == request()->path() ? 'active-nav-link' : ''}} text-white py-4 pl-6 nav-item">
                    <div class="mr-3">
                        <svg class="h-6 w-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="13" r="2" />  <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />  <path d="M6.4 20a9 9 0 1 1 11.2 0Z" /></svg>
                    </div>
                    Dashboard
                </a>
                <a href="/product" class="flex items-center {{ 'product' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <div class="mr-3">    
                        <svg class="h-6 w-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />  <line x1="12" y1="12" x2="20" y2="7.5" />  <line x1="12" y1="12" x2="12" y2="21" />  <line x1="12" y1="12" x2="4" y2="7.5" /></svg>
                    </div>
                    Product
                </a>
                <a href="/distributor" class="flex items-center {{ 'distributor' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <div class="mr-3">
                        <svg class="w-6 h-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />  <line x1="3" y1="9" x2="7" y2="9" /></svg>
                    </div>
                    Distributor
                </a>
                <a href="/distributor_product" class="flex items-center {{ 'distributor_product' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <div class="mr-3">
                        <svg class="h-6 w-6 text-slate-900"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />  <path d="M22 12A10 10 0 0 0 12 2v10z" /></svg>
                    </div>
                    Stock
                </a>
                {{-- <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a> --}}
                @auth
                @if(auth()->user()->role == 'super admin')
                <a href="/admin" class="flex items-center {{ 'admin' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <div class="mr-3">
                        <svg class="h-6 w-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />  <circle cx="12" cy="12" r="3" /></svg>
                    </div>
                    Admin
                </a>
                @endif
                @endauth
            </nav>
            {{-- <a href="/admin" class="absolute w-full upgrade-btn bottom-0 {{ 'admin' == request()->path() ? 'active-nav-link' : ''}} text-white flex items-center justify-center py-4">
                <i class="fas fa-arrow-circle-up mr-3"></i>
                Admin
            </a> --}}
        </aside>
    
        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <div class="w-1/2"></div>
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">

                    <div class="items-center py-2 px-6 hidden sm:flex">  
                        @auth
                          Selamat Datang  {{ auth()->user()->name }} sebagai ({{ auth()->user()->role }})
                        @endauth
                    </div>
                    <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="">
                    </button>
                    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        {{-- <a href="{{route('profile.edit')}}" class="block px-4 py-2 account-link hover:text-white">Profile</a> --}}
                        <a href="{{route('logout')}}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                    
                    </div>
                </div>
            </header>
    
            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Spectron</a>
                    <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>
    
                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="/dashboard" class="flex items-center {{ 'test' == request()->path() ? 'active-nav-link' : ''}} text-white py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="/product" class="flex items-center {{ 'product' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Product
                    </a>
                    <a href="/distributor" class="flex items-center {{ 'distributor' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-table mr-3"></i>
                        Distributor
                    </a>
                    <a href="/distributor_product" class="flex items-center {{ 'distributor_product' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Stock
                    </a>
                    @auth
                    @if(auth()->user()->role == 'super admin')
                    <a href="/admin" class="flex items-center {{ 'admin' == request()->path() ? 'active-nav-link' : ''}} text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Admin
                    </a>
                    @endif
                    @endauth
                    <a href="{{route('logout')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                  
                </nav>
                <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> New Report
                </button> -->
            </header>
        
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    {{$slot}}
                </main>
        
                {{-- <footer class="w-full bg-white text-right p-4">
                   
                </footer> --}}
            </div>
            
        </div>
    
        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        {{-- Flowbite --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        {{-- ajax --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        


       
    </body>
</html>
