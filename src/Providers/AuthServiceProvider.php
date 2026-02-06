<?php

namespace ITMobile\ITMobileCommon\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use ITMobile\ITMobileCommon\Auth\JwtTokenDecoder;
use ITMobile\ITMobileCommon\Auth\Middleware\AuthenticateJwt;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(JwtTokenDecoder::class, function ($app) {
            return new JwtTokenDecoder(
                publicKey: config('itm-auth.public_key'),
                algorithm: config('itm-auth.algo')
            );
        });

        $this->app->bind(AuthenticateJwt::class, function ($app) {
            return new AuthenticateJwt(
                decoder: $app->make(JwtTokenDecoder::class),
                header: config('itm-auth.header', 'Authorization'),
                prefix: config('itm-auth.prefix', 'Bearer')
            );
        });
    }

    public function boot(): void
    {
        // publish config
        $this->publishes([
            __DIR__.'../../config/itm-auth.php' => config_path('itm-auth.php'),
        ], 'config');

        // middleware alias register
        $this->app->booted(function () {
            /** @var Router $router */
            $router = $this->app->make(Router::class);
            $router->aliasMiddleware('iam.auth', AuthenticateJwt::class);
        });
    }
}
