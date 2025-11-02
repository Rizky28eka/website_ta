<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        // Jika belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $routeName = $request->route()->getName();
        Log::info("User role: {$user->role} | Route: {$routeName}");

        // Akses untuk admin
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Akses untuk operator
        if ($user->role === 'operator') {
            $allowedRoutes = [
                'admin.dashboard',
                // inventaris
                'inventaris.index',
                'inventaris.create',
                'inventaris.edit',
                'inventaris.update',
                'inventaris.store',
                // stokopname
                'stokopname.index',
                'stokopname.create',
                'stokopname.edit',
                 'stokopname.store',
                  'stokopname.update',
                   'stokopname.index',
                   //barangmasuk
                'barangmasuk.create',
                'barangmasuk.edit',
                 'barangmasuk.store',
                  'barangmasuk.update',
                  'barangmasuk.index',
                   //barangkeluar
                'barangkeluar.create',
                'barangkeluar.edit',
                 'barangkeluar.store',
                  'barangkeluar.update',
                  'barangkeluar.index',
                  //laporan
                'laporan.stokopname',
                'laporan.stokopname.pdf',
                  'laporan.inventaris',
                'laporan.inventaris.pdf',
            ];

            if (in_array($routeName, $allowedRoutes)) {
                return $next($request);
            }

            abort(403, 'Akses ditolak untuk operator.');
        }

        abort(403, 'Akses ditolak.');
    }
}
