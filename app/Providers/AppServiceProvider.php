<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('uniqueattr','App\ContactsApp\Validation\CustomValidator@uniqueAttribute');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\ContactsApp\Repositories\Contacts\ContactsRepositoryInterface',
            'App\ContactsApp\Repositories\Contacts\ContactsRepository'
        );
    }
}
