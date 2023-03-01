<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {      
        Gate::define('admin', function(User $user){
            if ($user->role == 'Admin Provinsi' || $user->role == 'Admin Satker'){
                return $user;
            };
        });

        Gate::define('penilai', function(User $user){
            if ($user->role == 'Penilai' || $user->role == 'Admin Provinsi' || $user->role == 'Admin Satker'){
                return $user;
            };
        });

        Gate::define('ketua', function(User $user){
            if (session('ketua_tim') == 1 || $user->role == 'Admin Provinsi' || $user->role == 'Admin Satker'){
                return $user;
            };
        });

        Gate::define('struktural', function(User $user){
            if ($user->role == 'struktural' || $user->role == 'Admin Provinsi'){
                return $user;
            };
        });

        Gate::define('sdm', function(User $user){
            if ($user->role == 'sdm' || $user->role == 'struktural' || $user->role == 'Admin Provinsi'){
                return $user;
            };
        });
    }


}
