<?php

namespace LaraibaTest\Resource\Setup;

use Laraiba\Resource\Setup\DefaultServiceProvider;

class DefaultServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementsServiceProviderInterface()
    {
        $d = new DefaultServiceProvider();

        $this->assertInstanceOf('Pimple\ServiceProviderInterface', $d);
    }

    public function testRegister()
    {
        $d = new DefaultServiceProvider();
        $pimple = new \Pimple\Container();

        $d->register($pimple);

        $this->assertNotNull($pimple['laraiba.ayat_repository']);
        $this->assertNotNull($pimple['laraiba.ayat_repository_factory']);
        $this->assertNotNull($pimple['laraiba.surat_repository']);
        $this->assertNotNull($pimple['laraiba.surat_repository_factory']);
        $this->assertNotNull($pimple['laraiba.translation_manager']);
    }
}
