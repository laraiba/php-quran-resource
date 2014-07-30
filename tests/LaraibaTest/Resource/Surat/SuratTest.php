<?php

namespace LaraibaTest\Resource\Surat;

use Laraiba\Resource\Surat\SuratInterface;
use Laraiba\Resource\Surat\Surat;

class SuratTest extends \PHPUnit_Framework_TestCase
{
    protected $surat;

    public function setUp()
    {
        $this->surat = new Surat();
    }

    public function testInstanceOfSuratInterface()
    {
        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratInterface', $this->surat);
    }

    public function testSuratNumberIsMutable()
    {
        $this->surat->setSuratNumber(10);
        $this->assertEquals(10, $this->surat->getSuratNumber());
    }

    public function testArabicNameIsMutable()
    {
        $this->surat->setArabicName('الفاتحة');
        $this->assertEquals('الفاتحة', $this->surat->getArabicName());
    }

    public function testTransliteratedNameIsMutable()
    {
        $this->surat->setTransliteratedName('al fatihah');
        $this->assertEquals('al fatihah', $this->surat->getTransliteratedName());
    }

    public function testSuratContainsAyat()
    {
        $ayat = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');

        $this->surat->addAyat($ayat);
        $this->assertEquals(1, $this->surat->getAyatCount());
        $this->assertEquals(array($ayat), $this->surat->getAyatList());
    }

    public function testAddAyatList()
    {
        $ayat1 = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');
        $ayat2 = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');

        $this->surat->addAyatList(array($ayat1, $ayat2));
        $this->assertEquals(2, $this->surat->getAyatCount());
        $this->assertEquals(array($ayat1, $ayat2), $this->surat->getAyatList());
    }
}
