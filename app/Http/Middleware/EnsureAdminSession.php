<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminSession
{
    public function handle(Request $request, Closure $next): Response
    {
        $adminUserId = $request->session()->get('admin_user_id');

        if (! $adminUserId) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $adminUser = User::find($adminUserId);

        if (! $adminUser || $adminUser->role !== 'admin') {
            $request->session()->forget(['admin_user_id', 'admin_user_name']);

            return redirect()->route('admin.login')->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}
