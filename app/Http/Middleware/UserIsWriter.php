<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserIsWriter
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_writer) {
            return $next($request);
        }
        return redirect(route('homepage'))->with('error', 'Accesso non consentito. Solo i redattori possono accedere a questa sezione.');
    }
}
