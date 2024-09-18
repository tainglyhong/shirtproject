<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cashier\User;
use App\Models\User as ModelsUser;
use Laravel\Cashier\Cashier;

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
        Cashier::useCustomerModel(customerModel: ModelsUser::class);
    }
}
