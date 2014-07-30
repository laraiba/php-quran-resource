<?php

namespace Laraiba\Resource\Surat\Repository;

use Laraiba\Resource\Surat\Initializer\SuratInitializerInterface;
use Laraiba\Resource\Surat\Surat;

class SuratRepositoryFactory
{
    private $initializers = array();

    public function addInitializer(SuratInitializerInterface $initializer)
    {
        $this->initializers[] = $initializer;
    }

    public function getInitializers()
    {
        return $this->initializers;
    }

    public function createSuratRepository()
    {
        $data = include __DIR__ . '/../../../../../data/surat-data.php';
        $suratData = array();

        foreach ($data as $suratNumber => $surat) {
            $suratModel = new Surat();
            $suratModel->setSuratNumber($suratNumber);
            $suratModel->setArabicName($surat['arabic_name']);

            if (isset($surat['transliterated_name'])) {
                $suratModel->setTransliteratedName($surat['transliterated_name']);
            }

            foreach ($this->initializers as $initializer) {
                $initializer->initialize($suratModel);
            }

            $suratData[$suratNumber] = $suratModel;
        }

        return new ArraySuratRepository($suratData);
    }
}
