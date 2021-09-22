<?php

declare(strict_types=1);

namespace Tabuna\Memento;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Collection;

class MementoStorage implements Store
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $items;

    /**
     * Create a new Memento store.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = new Collection();
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param string|array $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->items->get($key);
    }

    /**
     * @param array $keys
     *
     * @return array|void
     */
    public function many(array $keys)
    {
        return $this->get($keys);
    }

    /**
     * Store an item in the cache for a given number of seconds.
     *
     * @param string $key
     * @param mixed  $value
     * @param int    $seconds
     *
     * @return void
     */
    public function put($key, $value, $seconds = null)
    {
        $this->items->put($key, $value);
    }

    /**
     * @param array $values
     * @param null  $seconds
     *
     * @return void
     */
    public function putMany(array $values, $seconds = null)
    {
        foreach ($values as $keys => $value) {
            $this->put($keys, $value);
        }
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function increment($key, $value = 1)
    {
        $this->put($key, $this->get($key) + $value);
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function decrement($key, $value = 1)
    {
        $this->put($key, $this->get($key) - $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function forever($key, $value)
    {
        $this->put($key, $value);
    }

    /**
     * Remove an item from the cache.
     *
     * @param string $key
     *
     * @return void
     */
    public function forget($key)
    {
        $this->items->forget($key);
    }

    /**
     * Remove all items from the cache.
     *
     * @return void
     */
    public function flush()
    {
        $this->items = new Collection();
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix(): string
    {
        return '';
    }
}
