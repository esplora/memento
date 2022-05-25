# Memento ⌛️

**Memento** is a small package that only stores the result within a single request or job.

Package adds a new cache stored in the container instance, which avoids using
a [Laravel Cache](https://laravel.com/docs/cache#introduction) with access to the file system or fast storage like Redis
when needed in a very short lifetime.

## Installation

You may install Memento into your project using the Composer package manager:

```bash
composer require assisted-mindfulness/memento
```

## Usage

The simplest use is with a helper function that will return the result:

```php
memento('users', function() {
  return DB::table('users')->get();
});
```

No matter how many times you make a repeated call, it will return the first executed value. After the completion of the
HTTP request or Job queue, the cache will be flush automatically.

## Flushing the cache

To flush the entire cache you can call:

```php
use AssistedMindfulness\Memento\Memento;

Memento::flush();
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
