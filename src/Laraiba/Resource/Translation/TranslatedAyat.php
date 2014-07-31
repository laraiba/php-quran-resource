<?php

namespace Laraiba\Resource\Translation;

use Laraiba\Resource\Ayat\AyatInterface;
use Laraiba\Resource\Ayat\Ayat;

class TranslatedAyat extends Ayat implements TranslatedAyatInterface
{
    private $ayat;

    public function setAyat(AyatInterface $ayat)
    {
        $this->ayat = $ayat;
    }

    public function getAyat()
    {
        return $this->ayat;
    }
}
