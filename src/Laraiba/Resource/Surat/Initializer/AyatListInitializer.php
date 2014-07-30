<?php

namespace Laraiba\Resource\Surat\Initializer;

use Laraiba\Resource\Surat\SuratInterface;
use Laraiba\Resource\Ayat\Repository\AyatRepositoryInterface;

class AyatListInitializer implements SuratInitializerInterface
{
    private $ayatRepository;

    public function __construct(AyatRepositoryInterface $ayatRepository)
    {
        $this->ayatRepository = $ayatRepository;
    }

    public function getAyatRepository()
    {
        return $this->ayatRepository;
    }

    public function initialize(SuratInterface $surat)
    {
        $ayatList = $this->ayatRepository->findBySuratNumber($surat->getSuratNumber());

        $surat->addAyatList($ayatList);
    }
}
