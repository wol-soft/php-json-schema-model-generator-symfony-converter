<?php

use PHPModelGenerator\Model\GeneratorConfiguration;
use PHPModelGenerator\ModelGenerator;

require_once __DIR__ . '/../vendor/autoload.php';

$generator = new ModelGenerator((new GeneratorConfiguration())->setNamespacePrefix('\\App\\Model'));
$generator->generateModelDirectory(__DIR__ . '/App/Model');
$generator->generateModels(__DIR__ . '/App/Schema', __DIR__ . '/App/Model');
