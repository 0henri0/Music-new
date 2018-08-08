<?php

namespace App\Providers;

use App\Repositories\Category\CategoryEloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Country\CountryEloquentRepository;
use App\Repositories\Country\CountryRepositoryInterface;
use App\Repositories\Singer\SingerEloquentRepository;
use App\Repositories\Singer\SingerRepositoryInterface;
use App\Repositories\Song\SongEloquentRepository;
use App\Repositories\Song\SongRepositoryInterface;
use App\Repositories\User\UserEloquentRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserEloquentRepository::class);
        $this->app->singleton(SongRepositoryInterface::class, SongEloquentRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryEloquentRepository::class);
        $this->app->singleton(CountryRepositoryInterface::class, CountryEloquentRepository::class);
        $this->app->singleton(SingerRepositoryInterface::class, SingerEloquentRepository::class);
    }
}
