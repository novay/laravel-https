<?php

namespace Novay\ForceHttps\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('laravel-https.active') === 1):
            return redirect()->secure($request->getRequestUri());
        endif;

        return $next($request);
    }
}