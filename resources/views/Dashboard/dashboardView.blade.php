<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    <div class="flex flex-wrap">
        
            <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5 mb-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-blueGray-400 uppercase font-bold text-xs"> Distributor</h5>
                    <span class="font-semibold text-xl text-blueGray-700">{{$distributorCount}}</span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-red-500">
                        <svg class="w-6 h-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />  <line x1="3" y1="9" x2="7" y2="9" /></svg>
                    </div>
                    </div>
                </div>
                {{-- <p class="text-sm text-blueGray-400 mt-4">
                    <span class="text-emerald-500 mr-2"><i class="fas fa-arrow-up"></i> 2,99% </span>
                    <span class="whitespace-nowrap"> Since last month </span>
                </p> --}}
                </div>
            </div>
            </div>
        
            <div class=" mt-4 w-full lg:w-6/12 xl:w-4/12 px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">Product</h5>
                    <span class="font-semibold text-xl text-blueGray-700">{{$productCount}}</span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-pink-500">
                        <svg class="h-6 w-6 text-slate-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />  <line x1="12" y1="12" x2="20" y2="7.5" />  <line x1="12" y1="12" x2="12" y2="21" />  <line x1="12" y1="12" x2="4" y2="7.5" /></svg>
                    </div>
                    </div>
                </div>
                {{-- <p class="text-sm text-blueGray-400 mt-4">
                    <span class="text-red-500 mr-2"><i class="fas fa-arrow-down"></i> 4,01%</span>
                    <span class="whitespace-nowrap"> Since last week </span>\
                </p> --}}
                </div>
            </div>
            </div>
        
            <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">Stock</h5>
                    <span class="font-semibold text-xl text-blueGray-700">{{$distributorProductCount}}</span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-green-300">
                        <svg class="h-8 w-8 text-slate-900"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />  <path d="M22 12A10 10 0 0 0 12 2v10z" /></svg>
                    </div>
                    </div>
                </div>
                {{-- <p class="text-sm text-blueGray-400 mt-4">
                    <span class="text-red-500 mr-2"><i class="fas fa-arrow-down"></i> 1,25% </span>
                    <span class="whitespace-nowrap"> Since yesterday </span>
                </p> --}}
                </div>
            </div>
            </div>
         
            
                
      
            <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                <p class="text-xl pb-3 flex items-center">
                    <svg class="h-7 w-7 text-gray-900"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                      </svg>                      
                    Grafik Bar
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartOne" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                <p class="text-xl pb-3 flex items-center">
                    <svg class="h-7 w-7 text-gray-900"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="19" x2="20" y2="19" />  <polyline points="4 15 8 9 12 11 16 6 20 10" /></svg> Grafik Kurva
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartTwo" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        {{-- <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Latest Reports
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Lian</td>
                            <td class="w-1/3 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                            <td class="w-1/3 text-left py-3 px-4">Williams</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                            <td class="w-1/3 text-left py-3 px-4">Brown</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Lian</td>
                            <td class="w-1/3 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                            <td class="w-1/3 text-left py-3 px-4">Williams</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                            <td class="w-1/3 text-left py-3 px-4">Brown</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
</x-dashboard-layout>
<script>
      // Panggil fungsi initializeCharts() saat halaman dimuat
      document.addEventListener("DOMContentLoaded", function() {
        initializeCharts(@json(compact('distributorCount', 'productCount', 'distributorProductCount')));
    });
    // Panggil fungsi initializeCharts() saat halaman dimuat

    // Fungsi untuk menginisialisasi grafik dengan data JSON
    function initializeCharts(data) {
        var chartOne = document.getElementById('chartOne');
        var chartTwo = document.getElementById('chartTwo');

        // Inisialisasi grafik bar
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Distributor', 'Product', 'Stock'],
                datasets: [{
                    label: '# of Count',
                    data: [
                        data.distributorCount,
                        data.productCount,
                        data.distributorProductCount
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Inisialisasi grafik line
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Distributor', 'Product', 'Stock'],
                datasets: [{
                    label: '# of Count',
                    data: [
                        data.distributorCount,
                        data.productCount,
                        data.distributorProductCount
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
</script>


