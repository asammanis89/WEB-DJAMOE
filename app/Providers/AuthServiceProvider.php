<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- 1. TAMBAHKAN INI
use App\Models\User; // <-- 2. TAMBAHKAN INI

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 3. TAMBAHKAN BLOK KODE INI
        // Ini mendaftarkan izin 'superadmin'
        // Logic-nya: user boleh 'superadmin' JIKA role-nya == 'super_admin'
        Gate::define('superadmin', function (User $user) {
            return $user->role == 'super_admin';
        });
    }
}