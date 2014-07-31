<?php

namespace Laraiba\Resource\Translation;

use Laraiba\Resource\Ayat\AyatInterface;

class TranslationManager implements TranslationManagerInterface
{
    private $translations = array();

    private $defaultTranslation;

    public function addTranslation(TranslationInterface $translation, $default = false)
    {
        $this->translations[] = $translation;

        if ($default || count($this->translations) == 1) {
            $this->defaultTranslation = $translation;
        }
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function setDefaultTranslation(TranslationInterface $translation)
    {
        $this->defaultTranslation = $translation;
    }

    public function getDefaultTranslation()
    {
        return $this->defaultTranslation;
    }

    public function translate(AyatInterface $ayat, TranslationInterface $translation = null)
    {
        if (null === $translation) {
            $translation = $this->defaultTranslation;
        }

        return $translation->findOneById($ayat->getId());
    }
}
