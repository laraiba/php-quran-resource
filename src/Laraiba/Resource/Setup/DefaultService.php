<?php

namespace Laraiba\Resource\Setup;

use Laraiba\Resource\ServiceContainer\ServiceContainer;

class DefaultService
{
    public static function getServiceContainer()
    {
        $container = new ServiceContainer();
        $container->register(new DefaultServiceProvider());

        return $container;
    }
}
