<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsRevisor
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'revisor') {
            return $next($request);
        }
        return redirect(route('homepage'))->with('error', 'Accesso non consentito. Solo i revisori possono accedere a questa sezione.');
    }
}
