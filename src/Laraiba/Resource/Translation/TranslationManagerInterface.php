<?php

namespace Laraiba\Resource\Translation;

use Laraiba\Resource\Ayat\AyatInterface;

interface TranslationManagerInterface
{
    public function addTranslation(TranslationInterface $translation, $default = false);

    public function getTranslations();

    public function setDefaultTranslation(TranslationInterface $translation);

    public function getDefaultTranslation();

    public function translate(AyatInterface $ayat, TranslationInterface $translation = null);
}
