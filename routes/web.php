<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\distributorProductController;
// use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\distributor_products;
// use App\Models\products;
// use App\Models\distributors;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('Dashboard.dashboardView');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('test', [DashboardController::class,'index'])->name('Dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::middleware('role:super admin')->group(function () {
      //halaman admin
      Route::resource('/admin', \App\Http\Controllers\AdminController::class);
    });

Route::middleware('role:super admin,admin')->group(function () {
    //halaman product
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::put('/productDetelete/{product}',[\App\Http\Controllers\ProductController::class, 'updateDelete']);
    //halaman distributor
    Route::resource('/distributor', \App\Http\Controllers\DistributorController::class);
    //halaman distributor product
    Route::resource('/distributor_product', \App\Http\Controllers\distributorProductController::class);
});
// Route::resource('/product', \App\Http\Controllers\ProductController::class);

Route::middleware('role:staff,admin,super admin')->group(function () {
    Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');;
    Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
    Route::get('/distributor', [\App\Http\Controllers\DistributorController::class, 'index'])->name('distributor.index');;
    Route::get('/distributor_product', [\App\Http\Controllers\distributorProductController::class, 'index'])->name('distributor_product.index');;
    
    Route::get('/distributor_product/{id}/qr-code', function($id) {
        // Temukan produk distributor berdasarkan ID
        $distributor_product = distributor_products::findOrFail($id);
        
        // Buat QR code dari nomor serial produk
        $qrCode = QrCode::format('png')->size(256)->errorCorrection('H')->generate($distributor_product->serial_number);
        
        // Ambil informasi distributor dan produk
        $distributor_name = $distributor_product->distributors->name;
        $product_name = $distributor_product->products->name;
        
        // Kirim respons JSON dengan informasi distributor, produk, dan gambar QR
        return response()->json([
            'distributor_name' => $distributor_name,
            'product_name' => $product_name,
            'qr_code' => base64_encode($qrCode),
        ]);
    });
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
