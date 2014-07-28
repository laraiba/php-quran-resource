<?php

namespace LaraibaTest\Resource\Ayat;

use Laraiba\Resource\Ayat\Ayat;

class AyatTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->ayat = new Ayat();
    }

    /**
     * @test
     */
    public function implementsAyatInterface()
    {
        $this->assertInstanceOf('Laraiba\Resource\Ayat\AyatInterface', $this->ayat);
    }

    /**
     * @test
     */
    public function textIsMutable()
    {
        $this->ayat->setText('text');
        $this->assertEquals('text', $this->ayat->getText());
    }
}
