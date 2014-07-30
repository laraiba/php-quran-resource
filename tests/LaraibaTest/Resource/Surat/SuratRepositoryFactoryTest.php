<?php

namespace LaraibaTest\Resource\Surat;

use Laraiba\Resource\Surat\SuratRepositoryFactory;

class SuratRepositoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSuratRepository()
    {
        $suratRepositoryFactory = new SuratRepositoryFactory();

        $suratRepository = $suratRepositoryFactory->createSuratRepository();

        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratRepositoryInterface', $suratRepository);

        $surat = $suratRepository->findOneBySuratNumber('114');
        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratInterface', $surat);
    }
}
