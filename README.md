# Project Info
We have implemented package which help use to communicate with surface interface through function.
## Budge Goes Here

[![Issue](https://img.shields.io/github/issues/neha0921/substrate-interface-package?style=flat-square)](https://github.com/neha0921/substrate-interface-package)


## Clone Package

```bash
git clone https://github.com/neha0921/substrate-interface-package.git
```


## Installation

You can install the package via composer:

```bash
composer require neha0921/substrate-interface-package
```
## Steps to create test enviornment

1. Create Test folder and one php file to test code

2. run command "touch composer.json"

3.  try to run following code.

## Usage (Just Like)

```php
$testClass = new SubstrateInterface("http_url");
echo $testClass->rpc->system->name();
```

## Testing

```bash
vendor/phpunit/phpunit/phpunit
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
