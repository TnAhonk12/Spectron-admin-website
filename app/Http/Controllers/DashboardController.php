<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\distributors;
use App\Models\products;
use App\Models\distributor_products;

class DashboardController extends Controller
{
    function index(){
        $distributorCount = distributors::where('is_active', 1)->count();
        $productCount = products::where('is_active', 1)->count();
        $distributorProductCount = distributor_products::where('is_active', 1)->count();

        // return response()->json([
        //     'distributorCount' => $distributorCount,
        //     'productCount' => $productCount,
        //     'distributorProductCount' => $distributorProductCount,
        // ]);

        // return view('Dashboard.dashboardView');
         // Jika Anda ingin merender tampilan, gunakan kode berikut
        return view('Dashboard.dashboardView', [
            'distributorCount' => $distributorCount,
            'productCount' => $productCount,
            'distributorProductCount' => $distributorProductCount,
        ]);
    }
}
