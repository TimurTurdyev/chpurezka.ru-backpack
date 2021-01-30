<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DontEndSlashMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->getRequestUri();

        if ($uri != '/' && $uri[strlen($uri) - 1] == '/') {
            return redirect(substr($uri, 0, strlen($uri) - 1), 301);
        }
        return $next($request);
    }
}
