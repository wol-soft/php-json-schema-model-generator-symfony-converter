[![Latest Version](https://img.shields.io/packagist/v/wol-soft/php-json-schema-model-generator-symfony-converter.svg)](https://packagist.org/packages/wol-soft/php-json-schema-model-generator-symfony-converter)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg)](https://php.net/)
[![Maintainability](https://api.codeclimate.com/v1/badges/940cde6f65ed06b3de69/maintainability)](https://codeclimate.com/github/wol-soft/php-json-schema-model-generator-symfony-converter/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/940cde6f65ed06b3de69/test_coverage)](https://codeclimate.com/github/wol-soft/php-json-schema-model-generator-symfony-converter/test_coverage)
[![Build Status](https://travis-ci.org/wol-soft/php-json-schema-model-generator-symfony-converter.svg?branch=master)](https://travis-ci.org/wol-soft/php-json-schema-model-generator-symfony-converter)
[![Coverage Status](https://coveralls.io/repos/github/wol-soft/php-json-schema-model-generator-symfony-converter/badge.svg?branch=master)](https://coveralls.io/github/wol-soft/php-json-schema-model-generator-symfony-converter?branch=master)
[![MIT License](https://img.shields.io/packagist/l/wol-soft/php-json-schema-model-generator-symfony-converter.svg)](https://github.com/wol-soft/php-json-schema-model-generator-symfony-converter/blob/master/LICENSE)

# php-json-schema-model-generator-symfony-converter

Provides a symfony converter for models generated with the [wol-soft/php-json-schema-model-generator](https://github.com/wol-soft/php-json-schema-model-generator) library.

## Requirements ##

- Requires at least PHP 7.2
- Requires the PHP extensions ext-json
- Requires Symfony

## Installation ##

The recommended way to install php-json-schema-model-generator-symfony-converter is through [Composer](http://getcomposer.org):
```
$ composer require wol-soft/php-json-schema-model-generator-symfony-converter
```

## Usage ##

To integrate models generated with the wol-soft/php-json-schema-model-generator library into your symfony project make sure you've added the `PHPModelGeneratorBundle` and the `SensioFrameworkExtraBundle` to your bundle configuration (eg. `config/bundles.php`):

```php
<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    PHPModelGenerator\Bundle\PHPModelGeneratorBundle::class => ['all' => true],
];
```

Additionally make sure converters are enabled eg. by creating a `config/packages/sensio_framework_extra.yaml` configuration file:

```yaml
sensio_framework_extra:
  request:
    converters: true
    auto_convert: true
```

Now all you have to do is using the generated models in your controller action. The models will be instantiated automatically by utilizing the body of the request as data input. If an invalid request body is sent and the validation fails an Exception will be thrown. Register an exception listener and convert the exception into a feasible response.

## Tests ##

The library is tested via [PHPUnit](https://phpunit.de/).

After installing the dependencies of the library via `composer update` you can execute the tests with `./vendor/bin/phpunit` (Linux) or `vendor\bin\phpunit.bat` (Windows). The test names are optimized for the usage of the `--testdox` output.
