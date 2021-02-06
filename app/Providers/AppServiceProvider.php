<?php

namespace App\Providers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->bind(AuthService::class, function () {
            return new AuthService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // подключаем bootstrap для пагинации
        Paginator::useBootstrap();

        // директива blade на проверку админа
        Blade::if('admin', function() {
            return User::where('id',Auth::user()->id)->firstOrFail()->is_admin;
        });
    }
}
