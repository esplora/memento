<?php

declare(strict_types=1);

namespace Esplora\Memento;

use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Events\RequestReceived;

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
        $this->app->singleton(MementoStorage::class, fn () => new MementoStorage);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(fn (RequestReceived $request) => Memento::flush());
        Event::listen(fn (JobProcessed $request) => Memento::flush());
    }
}
