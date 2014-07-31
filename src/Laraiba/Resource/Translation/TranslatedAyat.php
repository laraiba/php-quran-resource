<?php

namespace Laraiba\Resource\Translation;

use Laraiba\Resource\Ayat\AyatInterface;
use Laraiba\Resource\Ayat\Ayat;

class TranslatedAyat extends Ayat implements TranslatedAyatInterface
{
    public function setAyat(AyatInterface $ayat)
    {
        return $this->ayat;
    }

    public function getAyat()
    {
        return $this->ayat;
    }
}
