<?php

declare(strict_types=1);

namespace AssistedMindfulness\Memento;

use Illuminate\Support\Collection;

/**
 * Class MementoStorage.
 */
class MementoStorage
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
     * Store an item in the cache for a given number of seconds.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    public function put($key, $value)
    {
        $this->items->put($key, $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function forever($key, $value)
    {
        if ($this->items->has($key)) {
            return $this->get($key);
        }

        if (is_callable($value)) {
            $value = $value();
        }

        $this->put($key, $value);

        return $value;
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
}
