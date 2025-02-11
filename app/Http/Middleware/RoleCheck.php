<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
         // Periksa apakah pengguna sudah login
         if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Ambil peran pengguna saat ini
        $userRole = auth()->user()->role;

        // Periksa apakah peran pengguna termasuk dalam daftar yang diizinkan
        if (!in_array($userRole, $roles)) {
            // Jika tidak, kembalikan respons tidak diizinkan
            return abort(403, 'Role anda tidak di berikan akses untuk ini!.');
        }

        // Jika peran pengguna diizinkan, lanjutkan ke rute yang diminta
        return $next($request);
    }
}
