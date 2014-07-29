<?php

namespace Laraiba\Resource\Surat;

use Laraiba\Resource\Ayat\AyatInterface;

class Surat implements SuratInterface
{
    private $suratNumber;

    private $arabicName;

    private $transliteratedName;

    private $ayatList = array();

    public function setSuratNumber($suratNumber)
    {
        $this->suratNumber = $suratNumber;
    }

    public function getSuratNumber()
    {
        return $this->suratNumber;
    }

    public function setArabicName($arabicName)
    {
        $this->arabicName = $arabicName;
    }

    public function getArabicName()
    {
        return $this->arabicName;
    }

    public function setTransliteratedName($transliteratedName)
    {
        $this->transliteratedName = $transliteratedName;
    }

    public function getTransliteratedName()
    {
        return $this->transliteratedName;
    }

    public function getAyatCount()
    {
        return count($this->ayatList);
    }

    public function addAyat(AyatInterface $ayat)
    {
        $this->ayatList[] = $ayat;
    }

    public function getAyatList()
    {
        return $this->ayatList;
    }
}
