<?php

namespace Nekkoy\GatewaySmsukraine;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class SmsukraineServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewaySmsukraine\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewaySmsukraine\Services\GatewayService();
        });

        $this->app->singleton('gateway-smsukraine', function ($app) {
            return new \Nekkoy\GatewaySmsukraine\Services\GatewaySmsukraineService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-smsukraine.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-smsukraine');
    }
}
