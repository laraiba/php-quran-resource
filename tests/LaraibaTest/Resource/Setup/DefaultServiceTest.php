<?php

namespace LaraibaTest\Resource\Setup;

use Laraiba\Resource\Setup\DefaultService;

class DefaultServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetServiceContainerReturnServiceContainerInterface()
    {
        $container = DefaultService::getServiceContainer();

        $this->assertInstanceOf('Laraiba\Resource\ServiceContainer\ServiceContainerInterface', $container);
    }

    public function testGetServiceContainerReturnServiceContainingDefaultServices()
    {
        $container = DefaultService::getServiceContainer();
        $this->assertNotNull($container->raw('laraiba.ayat_repository'));
        $this->assertNotNull($container->raw('laraiba.surat_repository'));
    }
}
