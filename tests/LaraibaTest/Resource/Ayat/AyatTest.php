<?php

namespace LaraibaTest\Resource\Ayat;

use Laraiba\Resource\Ayat\Ayat;
use Laraiba\Resource\Ayat\AyatId;

class AyatTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->ayatId = new AyatId('2:25');
        $this->ayat   = new Ayat($this->ayatId);
    }

    public function testImplementsAyatInterface()
    {
        $this->assertInstanceOf('Laraiba\Resource\Ayat\AyatInterface', $this->ayat);
    }

    public function testTextIsMutable()
    {
        $this->ayat->setText('text');
        $this->assertEquals('text', $this->ayat->getText());
    }

    public function testConstructorPreserveId()
    {
        $this->assertSame($this->ayatId, $this->ayat->getId());
    }

    public function testGetIdAsString()
    {
        $this->assertEquals((string) $this->ayatId, $this->ayat->getIdAsString());
    }
}
