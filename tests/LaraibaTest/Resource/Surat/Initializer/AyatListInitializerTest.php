<?php

namespace LaraibaTest\Resource\Surat\Initializer;

use Laraiba\Resource\Surat\Initializer\AyatListInitializer;

class AyatListInitializerTest extends \PHPUnit_Framework_TestCase
{
    public function testPreserveAyatRepository()
    {
        $ayatRepository = $this->getMock('Laraiba\Resource\Ayat\Repository\AyatRepositoryInterface');

        $ayatListInitializer = new AyatListInitializer($ayatRepository);
        $this->assertSame($ayatRepository, $ayatListInitializer->getAyatRepository());
    }

    public function testInitialize()
    {
        $ayat1 = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');
        $ayat2 = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');

        $ayatList = array($ayat1, $ayat2);

        $surat = $this->getMock('Laraiba\Resource\Surat\SuratInterface');
        $surat->expects($this->once())
              ->method('addAyatList');

        $ayatRepository = $this->getMock('Laraiba\Resource\Ayat\Repository\AyatRepositoryInterface');

        $ayatRepository->expects($this->once())
                       ->method('findBySuratNumber')
                       ->will($this->returnValue($ayatList));

        $ayatListInitializer = new AyatListInitializer($ayatRepository);

        $ayatListInitializer->initialize($surat);
    }
}
