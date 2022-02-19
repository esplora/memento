<?php

declare(strict_types=1);

namespace AssistedMindfulness\Memento\Tests;

use AssistedMindfulness\Memento\Memento;
use AssistedMindfulness\Memento\MementoServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            MementoServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Memento' => Memento::class,
        ];
    }
}
