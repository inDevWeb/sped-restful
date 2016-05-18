<?php

namespace SpedRest\Providers;

use Illuminate\Support\ServiceProvider;

class SpedRestRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \SpedRest\Repositories\IssuerRepository::class,
            \SpedRest\Repositories\IssuerRepositoryEloquent::class
        );
        
        $this->app->bind(
            \SpedRest\Repositories\CertificateRepository::class,
            \SpedRest\Repositories\CertificateRepositoryEloquent::class
        );
        
        
        
        
    }
}
