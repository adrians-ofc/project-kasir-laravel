<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$positions)
    {
        if (!$this->checkPosition($positions)) {
            abort(403, 'Halaman ini tidak dapat diakses dengan posisi Anda saat ini');
        }

        return $next($request);
    }

    private function checkPosition($positions)
    {
        $userPosition = auth()->user()->position;

        return in_array($userPosition, $positions);
    }
}
