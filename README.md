# php-json-schema-model-generator-symfony-converter

Provides a symfony converter for models generated with the wol-soft/php-json-schema-model-generator library.

## Requirements ##

- Requires at least PHP 7.2
- Requires the PHP extensions ext-json

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

Now all you have to do is using the generated models in your controller action. The models will be instantiated automatically by utilizing the body of the request as data input.
