<?php

namespace ITMobile\ITMobileCommon\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use ITMobile\ITMobileCommon\Auth\JwtGuard;
use ITMobile\ITMobileCommon\Auth\JwtTokenDecoder;
use ITMobile\ITMobileCommon\Auth\Middleware\AuthenticateJwt;
use ITMobile\ITMobileCommon\Auth\Middleware\PermissionJwtMiddleware;
use ITMobile\ITMobileCommon\Auth\Middleware\RoleJwtMiddleware;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (! config('itm-auth.enabled', true)) {
            return;
        }

        $this->app->singleton(JwtTokenDecoder::class, fn () => new JwtTokenDecoder(
            publicKey: config('itm-auth.public_key'),
            algorithm: config('itm-auth.algo')
        ));

        $this->app->bind(AuthenticateJwt::class, fn ($app) => new AuthenticateJwt(
            decoder: $app->make(JwtTokenDecoder::class),
            header: config('itm-auth.header', 'Authorization'),
            prefix: config('itm-auth.prefix', 'Bearer')
        ));
    }

    public function boot(): void
    {
        // publish config
        $this->publishes([
            dirname(__DIR__, 2).'/config/itm-auth.php' => config_path('itm-auth.php'),
        ], 'config');

        if (! config('itm-auth.enabled', true)) {
            return;
        }

        // middleware alias register
        $this->app->booted(function () {
            /** @var Router $router */
            $router = $this->app->make(Router::class);
            $router->aliasMiddleware('iam.auth', AuthenticateJwt::class);
            $router->aliasMiddleware('iam.role', RoleJwtMiddleware::class);
            $router->aliasMiddleware('iam.permission', PermissionJwtMiddleware::class);

            Auth::extend('jwt', fn ($app, $name, array $config) => new JwtGuard($app->make('request')));
        });
    }
}
