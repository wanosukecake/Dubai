<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Date;
use Carbon\CarbonImmutable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Schedule\ScheduleRepositoryInterface::class,
            \App\Repositories\Schedule\ScheduleRepository::class
        );
        Date::use(CarbonImmutable::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // 本番環境(Heroku)でhttpsを強制する
        // if (\App::environment('production')) {
        //     \URL::forceScheme('https');
        // }
        Schema::defaultStringLength(191);
    }
}
