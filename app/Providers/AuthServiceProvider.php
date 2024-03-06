<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Pemain\PemainController;
use App\Policies\PemainPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        PemainController::class => PemainPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
