<?php

declare(strict_types=1);

namespace Tabuna\Memento;

use Illuminate\Support\Facades\Facade;

class Memento extends Facade
{
    /**
     * Initiate a mock expectation on the facade.
     *
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return MementoStorage::class;
    }
}
