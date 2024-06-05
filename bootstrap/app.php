<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogAcessoMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([
            \App\Http\Middleware\LogAcessoMiddleware::class
        ]);

        $middleware->alias([
            'log.acesso' => \App\Http\Middleware\LogAcessoMiddleware::class,
            'autenticacao' => \App\Http\Middleware\AutenticacaoMiddleware::class
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
