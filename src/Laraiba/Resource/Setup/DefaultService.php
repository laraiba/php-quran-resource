<?php

namespace Laraiba\Resource\Setup;

use Laraiba\Resource\ServiceContainer\ServiceContainer;

class DefaultService
{
    public function getServiceContainer()
    {
        $container = new ServiceContainer();
        $container->register(new DefaultServiceProvider());

        return $container;
    }
}
