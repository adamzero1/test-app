<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware([
                'auth:sanctum', 
                'api',
                'email_verified'
            ])
            // ->prefix('api')
            ->group(base_path('routes/api.php'));

            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(120)->by($request->user()->id)->response(function($request, $headers){
                throw new HttpResponseException(response()->json([
                    'message' => 'Too many requests, please wait and try again.'
                ], 429, $headers));
            });
        });
        RateLimiter::for('unauthenticated', function (Request $request) {
            return Limit::perMinute(10)->by($request->ip())->response(function($request, $headers){
                throw new HttpResponseException(response()->json([
                    'message' => 'Too many requests, please wait and try again.'
                ], 429, $headers));
            });
        });
    }
}
