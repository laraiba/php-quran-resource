<?php

namespace Laraiba\Resource\Surat;

interface SuratInterface
{
    public function getSuratNumber();

    public function getArabicName();

    public function getTransliteratedName();

    public function getAyatCount();

    public function getAyatList();
}
