<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define("is_admin", function (User $user) {
            return Str::substr($user->user_id, 0, 1) == 1;
        });
        
        Gate::define("is_user", function (User $user) {
            return Str::substr($user->user_id, 0, 1) == 2;
        });

        Gate::define("have_choose_member", function (User $user) {
            return count($user->payments) > 0;
        });

        Gate::define("have_not_choose_member", function (User $user) {
            return count($user->payments) == 0;
        });

        Gate::define("not_confirm_payment_yet", function (User $user) {
            return $user->payments->first()->payment_status == 1;
        });


    }
}
