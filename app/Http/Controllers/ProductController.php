<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\products;
// import the storage facade
use Illuminate\Support\Facades\Storage;


//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        //get all posts from Models
        $products = products::latest()->get();

        //return view with data
        return view('Product.productView', compact('products'));
    }

    public function create(): View
    {
        return view('Product.productCreate');
    }

     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['image', 'mimes:jpeg,jpg,png','max:50000'],
            'photo_original' => ['string', 'max:225'],
        ]);

         // Generate serial number
        $serial_number = $this->generateSerialNumber($request->name);

        // Initialize data array with required fields
        $data = [
            'name' => $request->name,
            'serial_number' => $serial_number,
        ];

        // Check if 'photo' field exists and handle accordingly
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_original = $photo->getClientOriginalName();
            $photo->storeAs('public/Products', $photo->hashName());
            $data['photo'] = $photo->hashName();
            $data['photo_original'] = $photo_original;
        }

        // Check if 'weight' field exists and add to data array
        if ($request->has('weight')) {
            $data['weight'] = $request->weight;
        }

        // Create product
        products::create($data);

        //redirect to index
        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    private function generateSerialNumber($name): string
    {
        $name_parts = explode(' ', $name);
        $serial_prefix = strtoupper(substr($name_parts[0], 0, 3)); // Get first three characters of the first word in name
        $serial_suffix = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generate 4-digit random number
        return $serial_prefix . '-' . $serial_suffix;
    }

    public function edit(string $id): View
    {
        //get post by ID
        $products = products::findOrFail($id);

        //render view with post
        return view('Product.productUpdate', compact('products'));
    }

    public function show(products $product)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $product  
        ]); 
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */

     public function updateDelete(Request $request, products $product)
     {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['image', 'mimes:jpeg,jpg,png' ,'max:50000'],
            'is_active' => ['boolean'],
         ]);
 
         
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }

         //update fields
        $data = [
            'name' => $request->name,
            'weight' => $request->weight,
            'is_active' => $request->is_active,
        ];

        //check if image is uploaded
        if ($request->hasFile('photo')) {
            //upload new image
            $photo = $request->file('photo');
            $photo_original = $photo->getClientOriginalName();
            $photo->storeAs('public/Products', $photo->hashName());

            //delete old image
            Storage::delete('public/Products/' . $product->photo);

            //update photo fields
            $data['photo'] = $photo->hashName();
            $data['photo_original'] = $photo_original;
        }

        //generate serial number if name is provided
        if ($request->name) {
            $serial_number = $this->generateSerialNumber($request->name);
            $data['serial_number'] = $serial_number;
        }

        //update product
        $product->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $product  
        ]);
     }
     public function update(Request $request, products $product)
     {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['image', 'mimes:jpeg,jpg,png' ,'max:50000'],
            'is_active' => ['boolean'],
         ]);
 
         
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }

         //update fields
        $data = [
            'name' => $request->name,
            'weight' => $request->weight,
            'is_active' => $request->has('is_active') ? $request->is_active : 1,
        ];

        //check if image is uploaded
        if ($request->hasFile('photo')) {
            //upload new image
            $photo = $request->file('photo');
            $photo_original = $photo->getClientOriginalName();
            $photo->storeAs('public/Products', $photo->hashName());

            //delete old image
            Storage::delete('public/Products/' . $product->photo);

            //update photo fields
            $data['photo'] = $photo->hashName();
            $data['photo_original'] = $photo_original;
        }

        //generate serial number if name is provided
        if ($request->name) {
            $serial_number = $this->generateSerialNumber($request->name);
            $data['serial_number'] = $serial_number;
        }

        //update product
        $product->update($data);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);
     }

     public function destroy($id)
     {
        //delete post by ID
        $product = products::findOrFail($id);
        //delete old image
        Storage::delete('public/Products/' . $product->photo);

        products::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }
}
