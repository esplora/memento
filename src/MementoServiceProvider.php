<?php

declare(strict_types=1);

namespace Tabuna\Memento;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MementoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MementoStorage::class, fn () => new MementoStorage());

        $this->app->booting(function () {
            Cache::extend('memento', function (Application $app) {
                return Cache::repository($app->make(MementoStorage::class));
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(fn (\Laravel\Octane\Events\RequestReceived $request) => Memento::flush());
        Event::listen(fn (\Illuminate\Queue\Events\JobProcessed $request) => Memento::flush());
    }
}
