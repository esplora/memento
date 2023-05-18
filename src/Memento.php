<?php

declare(strict_types=1);

namespace Esplora\Memento;

use Illuminate\Support\Facades\Facade;

/**
 * Class Memento.
 *
 * @method static mixed forever($key, $value)
 * @method static void  flush()
 */
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
