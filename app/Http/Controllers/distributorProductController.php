<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import Model "distributors
use App\Models\distributors;
use App\Models\distributor_products;
use App\Models\products; // Impor model products 
use Ramsey\Uuid\Uuid;

//return type View
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class distributorProductController extends Controller
{
    public function index()
    {
        //get all posts from Models
        $distributor_products = distributor_products::latest()->get();
        // Get all products
        $producties = products::where('is_active', 1)->get();
        // Get all distributors
        $distributories = distributors::where('is_active', 1)->get();

        //return view with data
        return view('DistributorProduct.distributorProductView', compact('distributor_products', 'producties', 'distributories'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'distributor_id' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'string', 'max:255'],
        ]);

        // Retrieve distributor and product details
        $distributor = distributors::findOrFail($request->distributor_id);
        $product = products::findOrFail($request->product_id);

        // Generate UUID
        $uuid = Uuid::uuid4()->toString();

        // Generate serial number
        $serialNumber = $this->generateSerialNumber($distributor->code, $product->serial_number, $uuid);

        // Create distributor product
        distributor_products::create([
            'id_distributor_product' => $uuid, // Assign the same UUID to id_distributor_product
            'serial_number' => $serialNumber,
            'distributor_id' => $request->distributor_id,
            'product_id' => $request->product_id,
        ]);

        // Redirect to index
        return redirect()->route('distributor_product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(distributor_products $distributor_product)
    {
        // Generate QR code from serial number
        $qrCode = QrCode::size(512)
                    ->format('png')
                    ->errorCorrection('M')
                    ->generate($distributor_product->serial_number);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $distributor_product,
            'qr_code' => $qrCode // Menambahkan QR code ke respons JSON  
        ]); 
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, distributor_products $distributor_product)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'distributor_id' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Retrieve distributor and product details
        $distributor = distributors::findOrFail($request->distributor_id);
        $product = products::findOrFail($request->product_id);
        // Generate UUID
        $uuid = Uuid::uuid4()->toString();
        
        // Check if distributor_id or product_id is changed
        $distributorIdChanged = $request->distributor_id !== $distributor_product->distributor_id;
        $productIdChanged = $request->product_id !== $distributor_product->product_id;

        // Generate serial number if distributor_id or product_id is changed
        if ($distributorIdChanged || $productIdChanged) {
            // Generate serial number
            $serialNumber = $this->generateSerialNumber($distributor->code, $product->serial_number,$uuid);

            // Update distributor product
            $distributor_product->update([
                'id_distributor_product' => $uuid,
                'serial_number' => $serialNumber,
                'distributor_id' => $request->distributor_id,
                'product_id' => $request->product_id,
                'is_active' => $request->is_active,
            ]);
        } else {
            // Update distributor product without changing the serial number
            $distributor_product->update([
                'distributor_id' => $request->distributor_id,
                'product_id' => $request->product_id,
                'is_active' => $request->is_active,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $distributor_product  
        ]);
    }


     private function generateSerialNumber($distributorCode, $productSerialNumber, $uuid)
    {
        // Combine distributor code, product serial number, and UUID
        $serialNumber = $distributorCode . '-' . $productSerialNumber . '-' . $uuid;

        return $serialNumber;
    }
     

    public function destroy($id)
    {
        //delete post by ID
        distributor_products::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }
}
