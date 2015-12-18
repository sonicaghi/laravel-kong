<?php

namespace Ignittion\Kong\Middleware;

use Closure;

class HasKeyAuthHeadersMiddleware
{
    /**
     * Run the filter
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle ($request, Closure $next, $header)
    {
        $name = ($header == 'username' ? 'X-Consumer-Username' : 'X-Consumer-Custom-ID');

        if (! $request->header($name)) {
            abort(400, 'Invalid Request Headers.');
        }

        return $next($request);
    }
}
