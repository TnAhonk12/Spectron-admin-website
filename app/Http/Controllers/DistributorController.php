<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import Model "distributors
use App\Models\distributors;
use App\Models\City; // Impor model City di atas
use App\Models\Province; // Impor model Province di atas

//return type View
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


//return type redirectResponse
use Illuminate\Http\RedirectResponse;



class DistributorController extends Controller
{
    // public function index(): View{
    //     return view('Distributor.distributorView', [
    //         'distributors' => distributors::latest()->paginate(5)
    //     ]);

        
    //     // return view('Distributor.distributorView');
    // }

    public function index()
    {
        //get all posts from Models
        $distributors = distributors::latest()->get();
        // Get all cities
        $cities = City::all();
        // Get all provincies
        $provincies = Province::all();

        //return view with data
        return view('Distributor.distributorView', compact('distributors', 'cities', 'provincies'));
    }


        /**
     * create (menampilkan halaman create)
     *
     * @return View
     */
    public function create(): View
    {
        return view('Distributor.distributorCreate');
    }
    

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $cities = City::all();
        //validate form
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

         // Generate code from name
        $name = $request->name;
        $code = $this->generateCodeFromName($name);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        distributors::create([
            'code' => $code,
            'name' => $request->name,
            'country_code' => $request->country_code,
            'contact' => $request->contact,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'address' => $request->address,
        ]);

        //redirect to index
        return redirect()->route('distributor.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        // Function to generate code from name
    private function generateCodeFromName($name) {
       // Generate code from name
        $name_parts = explode(' ', $name);
        $code_prefix = '';
        foreach ($name_parts as $part) {
            $code_prefix .= strtoupper(substr($part, 0, 1)); // Ambil huruf pertama dari setiap kata
        }

        // Ambil tanggal saat ini sebagai bagian tengah kode
        $date_part = date('dmy');

        // Generate angka random 3 digit
        $random_part = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);

        return $code_prefix . $date_part . $random_part;
    }

    public function show(distributors $distributor)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $distributor  
        ]); 
    }

  
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */

    public function update(Request $request, distributors $distributor)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'code' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
            'address' => ['required', 'string', 'max:255'],
        
        ]);

        
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Generate code if name is changed
        if ($request->name !== $distributor->name) {
            // Generate code from new name
            $name = $request->name;
            $code = $this->generateCodeFromName($name);
        } else {
            // Keep the existing code
            $code = $distributor->code;
        }

        // Update distributor
        $distributor->update([
            'code' => $code,
            'name' => $request->name,
            'country_code' => $request->country_code,
            'contact' => $request->contact,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'is_active' => $request->is_active,
            'address' => $request->address,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data'    => $distributor  
        ]);
        //create post
     
        //return response
        
    }


    public function destroy($id)
    {
        //delete post by ID
        distributors::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }



}
