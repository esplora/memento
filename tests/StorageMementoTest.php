<?php

declare(strict_types=1);

namespace Esplora\Memento\Tests;

use Esplora\Memento\Memento;

class StorageMementoTest extends TestCase
{
    /**
     * @var string
     */
    protected $count = 0;

    /**
     * @return int|string
     */
    protected function increments()
    {
        $this->count++;

        return $this->count;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->count = 0;
    }

    public function test_write_value(): void
    {
        $value = memento('count', function () {
            return $this->increments();
        });

        $this->assertEquals(1, $value);
    }

    public function test_write_duplicate_value(): void
    {
        memento('count', function () {
            return $this->increments();
        });

        $this->count = 123;

        $value = memento('count', function () {
            return $this->increments();
        });

        $this->assertEquals(123, $this->count);
        $this->assertEquals(1, $value);
    }

    public function test_flush_cache(): void
    {
        memento('count', function () {
            return $this->increments();
        });

        Memento::flush();

        $value = memento('count', function () {
            return $this->increments();
        });

        $this->assertEquals(2, $value);
    }
}
