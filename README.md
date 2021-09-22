# Memento 

Memento is a driver for Laravel Cache which stores results only within a single request or job.

## Installation

You may install Memento into your project using the Composer package manager:

```bash
composer require tabuna/memento
```

## Usage

The simplest use is with a helper function that will return the result:

```php
memento('users' function() {
  return DB::table('users')->get();
});
```

You can also use it with the Cache facade:

```php
$value = Cache::store('memento')->get('users');
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
