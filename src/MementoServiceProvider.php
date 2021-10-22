<?php

declare(strict_types=1);

namespace Tabuna\Memento;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class MementoServiceProvider.
 */
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
