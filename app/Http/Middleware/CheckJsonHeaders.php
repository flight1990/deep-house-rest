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

        if (!in_array($request->method(), ['GET', 'DELETE'])) {
            $contentType = $request->header('Content-Type');

            if (!$contentType || (!str_contains($contentType, 'application/json') && !str_contains($contentType, 'multipart/form-data'))) {
                return response()->json(['error' => 'Invalid Content-Type header'], 415);
            }
        }

        return $next($request);
    }
}

