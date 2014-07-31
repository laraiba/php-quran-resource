<?php

namespace LaraibaTest\Resource\Translation;

use Laraiba\Resource\Ayat\AyatId;
use Laraiba\Resource\Translation\TranslatedAyat;

class TranslatedAyatTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementsAyatInterface()
    {
        $ayatId = $this->getMock('Laraiba\Resource\Ayat\AyatIdInterface');
        $translatedAyat = new TranslatedAyat($ayatId);
        $this->assertInstanceOf('Laraiba\Resource\Translation\TranslatedAyatInterface', $translatedAyat);
    }

    public function testExtendsAyat()
    {
        $ayatId = $this->getMock('Laraiba\Resource\Ayat\AyatIdInterface');
        $translatedAyat = new TranslatedAyat($ayatId);
        $this->assertInstanceOf('Laraiba\Resource\Ayat\Ayat', $translatedAyat);
    }

    public function testAyatIsMutable()
    {
        $ayatId = $this->getMock('Laraiba\Resource\Ayat\AyatIdInterface');
        $ayat   = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');
        $translatedAyat = new TranslatedAyat($ayatId);

        $this->assertNull($translatedAyat->getAyat());
        $translatedAyat->setAyat($ayat);
        $this->assertSame($ayat, $translatedAyat->getAyat());
    }
}
