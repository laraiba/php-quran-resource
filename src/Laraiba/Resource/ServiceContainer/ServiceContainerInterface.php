<?php

namespace Laraiba\Resource\ServiceContainer;

interface ServiceContainerInterface
{
    public function has($serviceName);

    public function get($serviceName);
}
