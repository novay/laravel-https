<?php

namespace Novay\ForceHttps;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Novay\ForceHttps\App\Http\Middleware\ForceHttps;

class ForceHttpsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->middlewareGroup('https', [ForceHttps::class]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/laravel-https.php', 'laravel-https');
        $this->publishFiles();
    }

    /**
     * Publish files for Laravel Logger.
     *
     * @return void
     */
    private function publishFiles()
    {
        $publishTag = 'laravel-https';

        $this->publishes([
            __DIR__.'/config/laravel-https.php' => base_path('config/laravel-https.php'),
        ], $publishTag);
    }

}
