<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJsonResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('Accept', 'application/json');
        $includes = $request->query('include');
        $appends = $request->query('append');
        $count_of_appends = count(explode(',', $appends));
        $count_of_includes = count(explode(',', $includes));
        if ($count_of_includes > 3) {
            return errorResponse('Too many includes. Max 3 allowed', [], 400);
        }
        if ($count_of_appends > 2) {
            return errorResponse('Too many appends. Max 2 allowed', [], 400);
        }
        return $next($request);
    }
}
