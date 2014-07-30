<?php

namespace Laraiba\Resource\Ayat\Repository;

use Laraiba\Resource\Ayat\AyatId;
use Laraiba\Resource\Ayat\Ayat;

class AyatRepositoryFactory
{
    public function createAyatRepository()
    {
        $data = include __DIR__ . '/../../../../../data/quran-uthmani.php';
        $ayatData = array();

        foreach ($data as $suratNumber => $ayatList) {
            foreach ($ayatList as $ayatNumber => $ayatText) {
                $ayat = new Ayat(new AyatId($suratNumber . ':' . $ayatNumber));
                $ayat->setText($ayatText);
                $ayat->setSuratNumber($suratNumber);
                $ayat->setAyatNumber($ayatNumber);

                $ayatData[$suratNumber][$ayatNumber] = $ayat;
            }
        }

        return new ArrayAyatRepository($ayatData);
    }
}
