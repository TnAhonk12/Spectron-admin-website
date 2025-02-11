<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


//return type redirectResponse
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts from Models
        $admins = User::latest()->get();

        //return view with data
        return view('Admin.adminView', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.adminCreate');
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
        $request->validate([
            // 'id_admin' => ['required', 'uuid'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);

        //create post
        User::create([
            // 'id_admin' => $request->id_admin,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        //redirect to index
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data admin berdasarkan ID
        $admin = User::findOrFail($id);


        // Mengirim data admin ke tampilan adminEdit.blade.php untuk diedit
        return response()->json(['data' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id) // Ganti $admin menjadi $id
{
    //define validation rules
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
    ]);

     
     //check if validation fails
     if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
     }

     // Mengambil data admin berdasarkan ID
     $admin = User::findOrFail($id);

     if($request->password){
         $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
    }else{
         $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ]);

     }

     return response()->json([
         'success' => true,
         'message' => 'Data Berhasil Diupdate!',
         'data'    => $admin  
     ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete post by ID
        User::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }
}
