<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Naudoju Gate::define, kad patikrinčiau ar autentifikuotas vartotojas turi reikiamą rolę.
     *
     * 'manage-user' skirta, jeigu programoje bus daugiau rolių turinčių vartotojų, pvz.:
     * 'admin', 'co-woker', ir t.t. tada galiu lengviau valdyti prieeiga prie duomenų.
     * Jeigu bus daugiau vartotojų kuriems galima pasiekti duomenis, reikia įvesti roles pavadinima į array.
     *
     * 'index-user' skirta, jeigu norėčiau apsaugoti funckiuonalumą nuo kitų vartotojų, kurie neturi 'admin' rolės.
     *
     * $user yra autentifikuotas vartotojas.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('index-user', function($user){
          return $user->hasRole('admin');
        });

        Gate::define('manage-user', function($user){
          return $user->hasAnyRoles(['admin']);
        });
    }
}
