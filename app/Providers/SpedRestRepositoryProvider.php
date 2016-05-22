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
        //Usuários
        $this->app->bind(
            \SpedRest\Repositories\UserRepository::class,
            \SpedRest\Repositories\UserRepositoryEloquent::class
        );
        //Emitentes
        $this->app->bind(
            \SpedRest\Repositories\IssuerRepository::class,
            \SpedRest\Repositories\IssuerRepositoryEloquent::class
        );
        //Certificados
        $this->app->bind(
            \SpedRest\Repositories\CertificateRepository::class,
            \SpedRest\Repositories\CertificateRepositoryEloquent::class
        );
        
        $this->app->bind(
            \SpedRest\Repositories\EnvironmentRepository::class,
            \SpedRest\Repositories\EnvironmentRepositoryEloquent::class
        );
        
        $this->app->bind(
            \SpedRest\Repositories\ProtocolRepository::class,
            \SpedRest\Repositories\ProtocolRepositoryEloquent::class
        );
        
        $this->app->bind(
            \SpedRest\Repositories\ContingencyRepository::class,
            \SpedRest\Repositories\ContingencyRepositoryEloquent::class
        );
        
      
    }
}
