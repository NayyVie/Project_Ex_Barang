<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = strtolower(trim(Auth::user()->role ?? ''));

        $workerRoles = ['worker', 'pekerja', 'teknisi'];
        $adminRoles = ['admin', 'admin gudang', 'admin_gudang'];

        $allowedRoles = match (strtolower($role)) {
            'worker' => $workerRoles,
            'admin' => $adminRoles,
            default => [],
        };

        if (!in_array($userRole, $allowedRoles, true)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}
