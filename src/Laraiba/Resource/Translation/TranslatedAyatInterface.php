<?php

namespace Laraiba\Resource\Translation;

use Laraiba\Resource\Ayat\AyatInterface;

interface TranslatedAyatInterface extends AyatInterface
{
    public function getAyat();
}
