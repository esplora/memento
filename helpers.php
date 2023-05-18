<?php

use Esplora\Memento\Memento;

if (!function_exists('memento')) {
    /**
     * Get an item from the cache, or execute the given Closure and store the result forever.
     *
     * @param string   $key
     * @param \Closure $callback
     *
     * @return mixed
     */
    function memento(string $key, \Closure $callback)
    {
        return Memento::forever($key, $callback);
    }
}
