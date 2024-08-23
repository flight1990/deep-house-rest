<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJsonHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->headers->has('Accept') || $request->header('Accept') !== 'application/json') {
            return response()->json(['error' => 'Invalid Accept header'], 406);
        }

        if ($request->method() !== 'GET' && (!$request->headers->has('Content-Type') || $request->header('Content-Type') !== 'application/json')) {
            return response()->json(['error' => 'Invalid Content-Type header'], 415);
        }

        return $next($request);
    }
}
