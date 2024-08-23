<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === 'admin') {
            // User is an admin, continue with the request
            return $next($request);
        }
        $this->clearCookies($request);
        // User is not an admin, return unauthorized response
        return redirect('/login',302)->with('error','Unauthorized');
    }
     /**
     * Clear cookies from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearCookies(Request $request)
    {
        $cookies = $request->cookies->all();
        foreach ($cookies as $cookieName => $cookieValue) {
            Cookie::queue(Cookie::forget($cookieName));
        }
    }
}
