<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdminMiddleware::class,
            //$middleware->prependToGroup('api', \App\Http\Middleware\AlwaysAcceptJson::class)
            'alwaysAcceptJson' => \App\Http\Middleware\AlwaysAcceptJson::class,
            //$middleware->statefulApi();

    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Object not found'], 404);
            }
        });
    })->create();
