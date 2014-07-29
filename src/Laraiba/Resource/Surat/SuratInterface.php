<?php

namespace Laraiba\Resource\Surat;

use Laraiba\Resource\Ayat\AyatInterface;

interface SuratInterface
{
    public function getSuratNumber();

    public function getArabicName();

    public function getTransliteratedName();

    public function getAyatCount();

    public function addAyat(AyatInterface $ayat);

    public function addAyatList(array $ayatList);

    public function getAyatList();
}
