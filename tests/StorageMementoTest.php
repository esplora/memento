<?php

declare(strict_types=1);

namespace Tabuna\Memento\Tests;

use Tabuna\Memento\Memento;

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

    public function testWriteValue(): void
    {
        $value = memento('count', function () {
            return $this->increments();
        });

        $this->assertEquals(1, $value);
    }

    public function testWriteDuplicateValue(): void
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

    public function testFlushCache(): void
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
