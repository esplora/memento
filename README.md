# <img src=".github/logo.svg?sanitize=true" width="24" height="24" alt="Memento"> Memento

[![Tests](https://github.com/esplora/memento/actions/workflows/phpunit.yml/badge.svg)](https://github.com/esplora/memento/actions/workflows/phpunit.yml)

**Memento** is a small package that stores the result of a function or operation within a single HTTP request or job.

The package adds a new cache stored in the container instance, which avoids the need to use
a [Laravel Cache](https://laravel.com/docs/cache#introduction) with access to the file system or fast storage like Redis
when the result only needs to be stored for a short time.

## Installation

You can install Memento in your project using the Composer package manager:

```bash
composer require esplora/memento
```

## Usage

The simplest way to use Memento is with the provided helper function:

```php
memento('users', function() {
  return DB::table('users')->get();
});
```

This function will return the result of the provided closure on the first call, and any subsequent calls within the same HTTP request or job will return the same result. The cache will be automatically flushed after the request or job is completed.

## Flushing the Cache

To flush the entire Memento cache, you can use the following code:

```php
use Esplora\Memento\Memento;

Memento::flush();
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
