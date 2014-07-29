<?php

namespace Laraiba\Resource\ServiceContainer;

use Pimple\Container as PimpleContainer;

class ServiceContainer extends PimpleContainer implements ServiceContainerInterface
{
    public function has($serviceName)
    {
        return $this->offsetExists($serviceName);
    }

    public function get($serviceName)
    {
        return $this->offsetGet($serviceName);
    }
}
