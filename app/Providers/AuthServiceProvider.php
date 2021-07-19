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
            if(Str::substr($user->user_id, 0, 1) == 1) return true;
        });
        
        Gate::define("is_user", function (User $user) {
            if(Str::substr($user->user_id, 0, 1) == 2) return true;
        });

        Gate::define("have_choose_member", function (User $user) {
            if(count($user->payments) > 0) return true;
        });

        Gate::define("have_not_choose_member", function (User $user) {
            if(count($user->payments) == 0) return true;
        });

        Gate::define("not_confirm_payment_yet", function (User $user) {
            if($user->payments->first()->payment_status == 1) return true;
        });

        Gate::define("active_member", function (User $user) {
            if(count($user->payments) == 0) return false;
            if($user->payments->last()->payment_status == 3) return true;
        });


    }
}
