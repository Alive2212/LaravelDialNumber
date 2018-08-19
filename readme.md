# LaravelDialNumber

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require alive2212/laravel-dial-number
```

```bash
$ php artisan vendor:publish --tag  laravel-dial-number.config
```

## Usage

```php
$dialNumber = new LaravelDialNumber();
return $dialNumber->initWithPhoneNumber('+989127390191')->getRaw();
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/alive2212/laraveldialnumber.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/alive2212/laraveldialnumber.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/alive2212/laraveldialnumber/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/alive2212/laraveldialnumber
[link-downloads]: https://packagist.org/packages/alive2212/laraveldialnumber
[link-travis]: https://travis-ci.org/alive2212/laraveldialnumber
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/alive2212
[link-contributors]: ../../contributors]