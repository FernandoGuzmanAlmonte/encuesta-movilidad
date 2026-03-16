<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Error 419: Token CSRF inválido (sesión expirada, config:cache roto, o cookies bloqueadas)
        $exceptions->report(function (\Illuminate\Session\TokenMismatchException $e) {
            \Illuminate\Support\Facades\Log::warning('CSRF 419: Token inválido al enviar formulario. Posibles causas: sesión expirada (>120min), config:cache activo, o cookies bloqueadas en el navegador.', [
                'url' => request()->fullUrl(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
            return false;
        });

        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            return redirect()->back()->withErrors([
                'csrf' => 'Tu sesión expiró o las cookies están bloqueadas en tu navegador. Por favor recarga la página e intenta enviar de nuevo. Si el problema persiste, verifica que tu navegador permita cookies.',
            ]);
        });

        // Sesión expirada o no pudo iniciarse
        $exceptions->report(function (\Illuminate\Session\SessionNotSetException $e) {
            \Illuminate\Support\Facades\Log::warning('Sesión no disponible al procesar solicitud.', [
                'url' => request()->fullUrl(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
            return false;
        });

        // Cookies bloqueadas (el driver de sesión no puede leer/escribir)
        $exceptions->report(function (\RuntimeException $e) {
            if (str_contains($e->getMessage(), 'Session store not set on request')) {
                \Illuminate\Support\Facades\Log::warning('Cookies bloqueadas: el navegador no permite guardar la sesión.', [
                    'url' => request()->fullUrl(),
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
                return false;
            }
        });
    })->create();
