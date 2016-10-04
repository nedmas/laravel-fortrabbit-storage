# Laravel driver for Fortrabbit Object Storage

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This Laravel package provides a storage driver for the Fortrabbit Object Storage.

## Install

Via Composer

``` bash
$ composer require nedmas/laravel-fortrabbit-storage
```

## Configuration

First follow the install guide from Fortrabbit for configuring the
[Object Storage](https://help.fortrabbit.com/install-laravel-5#toc-object-storage).

Then rename the disk from `s3` to `fortrabbit` and replace the `s3` driver with `fortrabbit`.
Finally you need to add an additional config key for `host` which retrieves the value from the app secrets array.

``` php
'fortrabbit' => [
    'driver'   => 'fortrabbit',
    'key'      => $secrets['OBJECT_STORAGE']['KEY'],
    'secret'   => $secrets['OBJECT_STORAGE']['SECRET'],
    'bucket'   => $secrets['OBJECT_STORAGE']['BUCKET'],
    'endpoint' => 'https://'. $secrets['OBJECT_STORAGE']['SERVER'],
    'region'   => $secrets['OBJECT_STORAGE']['REGION'],
    'host'     => $secrets['OBJECT_STORAGE']['HOST']
],
```

## Usage

``` php
Storage::disk('fortrabbit')->put('file.txt', 'Contents');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nedmas@mavenfortytwo.co.uk instead of using the issue tracker.

## Credits

- [Tom Densham][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/nedmas/laravel-fortrabbit-storage.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nedmas/laravel-fortrabbit-storage/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/nedmas/laravel-fortrabbit-storage.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/nedmas/laravel-fortrabbit-storage.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/nedmas/laravel-fortrabbit-storage.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/nedmas/laravel-fortrabbit-storage
[link-travis]: https://travis-ci.org/nedmas/laravel-fortrabbit-storage
[link-scrutinizer]: https://scrutinizer-ci.com/g/nedmas/laravel-fortrabbit-storage/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/nedmas/laravel-fortrabbit-storage
[link-downloads]: https://packagist.org/packages/nedmas/laravel-fortrabbit-storage
[link-author]: https://github.com/nedmas
[link-contributors]: ../../contributors
