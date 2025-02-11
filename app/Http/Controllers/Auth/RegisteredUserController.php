<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

//return type View
use Illuminate\Support\Facades\Validator;



class RegisteredUserController extends Controller
{
    public function index()
    {
        //get all posts from Models
        $users = User::latest()->get();

        //return view with data
        return view('Admin.adminView', compact('users'));
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function show(User $users)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $users 
        ]); 
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // 'id_admin' => ['required', 'uuid'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            // 'id_admin' => $request->id_admin,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */

     public function update(Request $request, User $user)
     {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'max:255'],
         ]);
 
         
         //check if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }

         $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    

         return response()->json([
             'success' => true,
             'message' => 'Data Berhasil Diupdate!',
             'data'    => $user  
         ]);
   
     }

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
