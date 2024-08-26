<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Http\JsonResponse;

class ApiExceptionHandler
{
    public function handle(Throwable $exception): JsonResponse
    {
        $status = $this->determineStatusCode($exception);
        $message = $this->determineMessage($exception);
        $errors = $this->determineErrors($exception);

        $response = ['message' => $message];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $status);
    }

    private function determineStatusCode(Throwable $exception): int
    {
        return match (true) {
            $exception instanceof NotFoundHttpException => 404,
            $exception instanceof HttpException => $exception->getStatusCode(),
            $exception instanceof AuthenticationException => 401,
            $exception instanceof AccessDeniedHttpException => 403,
            $exception instanceof ValidationException => 422,
            default => 500,
        };
    }

    private function determineMessage(Throwable $exception): string
    {
        return match (true) {
            $exception instanceof NotFoundHttpException => 'Resource not found',
            $exception instanceof HttpException, $exception instanceof ValidationException => $exception->getMessage(),
            $exception instanceof AuthenticationException => 'Unauthorized',
            $exception instanceof AccessDeniedHttpException => 'Forbidden',
            default => 'An error occurred',
        };
    }

    private function determineErrors(Throwable $exception): array
    {
        return $exception instanceof ValidationException
            ? $exception->errors()
            : [];
    }
}
