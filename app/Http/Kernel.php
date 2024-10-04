<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Prevents the server from sending a response with content length and output buffering.
        \Illuminate\Http\Middleware\TrustHosts::class,
        // Handles trusted proxies configuration.
        \Illuminate\Http\Middleware\TrustProxies::class,
        // Middleware to handle CORS (Cross-Origin Resource Sharing).
        \Fruitcake\Cors\HandleCors::class,
        // Middleware to handle maintenance mode.
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Validates and trims input.
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Middleware to trim whitespace from request inputs.
        \App\Http\Middleware\TrimStrings::class,
        // Converts empty input strings to null.
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Manages session state for web requests.
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Shares session state with the view layer.
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // Middleware to verify CSRF token for security.
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ],

        'api' => [
            // Throttle API requests.
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware to authenticate requests.
        'auth' => \App\Http\Middleware\Authenticate::class,
        // Middleware to restrict access to guests.
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        // Middleware to manage CORS headers.
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        // Middleware to verify user email.
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        // Middleware to redirect authenticated users.
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // Middleware to handle password confirmation.
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // Middleware to sign URLs.
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        // Middleware to throttle requests.
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // Middleware to ensure route model binding.
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // Middleware to verify user roles or permissions.
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
