<?php

declare(strict_types=1);

namespace PHPModelGenerator\Bundle\Tests;

use PHPModelGenerator\Bundle\PHPModelGeneratorBundle;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new SensioFrameworkExtraBundle(),
            new PHPModelGeneratorBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config_test.yml');
    }
}
