<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWritePermission
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa izin pengguna di sini
        $user = $request->user();

        // Cek apakah pengguna memiliki izin khusus (role_id 1 atau 2) atau izin umum write_data
        if ($user->role_id === 1 || $user->role_id === 2 || $user->hasPermissionTo('write_data')) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki izin yang sesuai, lakukan tindakan yang sesuai
        return response('Unauthorized', 401);
    }
}
