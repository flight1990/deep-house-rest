<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ApiExceptionHandler
{
    public function handle(Throwable $exception)
    {
        $status = match (true) {
            $exception instanceof NotFoundHttpException => 404,
            $exception instanceof HttpException => $exception->getStatusCode(),
            $exception instanceof AuthenticationException => 401,
            $exception instanceof AccessDeniedHttpException => 403,
            default => 500,
        };

        $message = match (true) {
            $exception instanceof NotFoundHttpException => 'Resource not found',
            $exception instanceof HttpException => $exception->getMessage(),
            $exception instanceof AuthenticationException => 'Unauthorized',
            $exception instanceof AccessDeniedHttpException => 'Forbidden',
            default => 'An error occurred',
        };

        return response()->json([
            'message' => $message,
        ], $status);
    }
}
