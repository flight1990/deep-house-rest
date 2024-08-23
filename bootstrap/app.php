<?php

use App\Exceptions\ApiExceptionHandler;
use App\Http\Middleware\CheckJsonHeaders;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(append: [
            CheckJsonHeaders::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $apiExceptionsHandler = new ApiExceptionHandler();

        $exceptions->render(function (Throwable $exception) use ($apiExceptionsHandler) {
            return $apiExceptionsHandler->handle($exception);
        });
    })->create();
