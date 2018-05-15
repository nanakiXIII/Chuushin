<?php

namespace App\Http\Middleware;

use Closure;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = ["Animes", "Scan", "Visual-novel", 'Light-novel'];
        if (!in_array($request->type, $url)){
            abort(404);
        }
        return $next($request);
    }
}
