<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    Gate::define('admin', function ($user) {
        return $user->role === 'admin'; 
    });
    Validator::replacer('min', function ($message, $attribute, $rule, $parameters) {
            if ($attribute === 'password') {
                return "Le mot de passe doit contenir au moins $parameters[0] caractères.";
            }
            return $message;
        });
    }
}
