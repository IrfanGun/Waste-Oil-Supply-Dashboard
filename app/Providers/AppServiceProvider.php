<?php

namespace App\Providers;


use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::before(function($user,$ability) {
            if($user->hasRole('admin')){
                return true;
            }
        });

        Gate::define('view-users', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('view_users');
        });


        // QueryBuilder::macro('search', function(string $attribute, string $searchTerm) {
        //     return $this->where($attribute, 'LIKE', "%{$searchTerm}%");
        //  });
        
        
        
    }
}
