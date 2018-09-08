<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

            \Validator::extend('email_domain', function($attribute, $value, $parameters, $validator) {
                $setting = setting::where('pkey','company_domain_name')->first();
              $allowedEmailDomains = [$setting->pvalue, 'sub.example.com'];
             return   in_array( explode('@', $parameters[0])[1] , $allowedEmailDomains);
        });

           \ Validator::extend('current_password', function( $attribute, $value, $parameters ,$validator) {
              // compare the entered password with what the database has, e.g. validates the current password
              return Hash::check( $value, Auth::user()->password );
            });
           $messages = [ 'current_password' => 'Your current password does not match our records.' ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
