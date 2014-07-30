<?php

namespace LaraibaTest\Resource\Surat\Repository;

use Laraiba\Resource\Surat\Repository\SuratRepositoryFactory;

class SuratRepositoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSuratRepository()
    {
        $suratRepositoryFactory = new SuratRepositoryFactory();

        $initializer1 = $this->getMock('Laraiba\Resource\Surat\Initializer\SuratInitializerInterface');
        $suratRepositoryFactory->addInitializer($initializer1);

        $suratRepository = $suratRepositoryFactory->createSuratRepository();

        $this->assertInstanceOf('Laraiba\Resource\Surat\Repository\SuratRepositoryInterface', $suratRepository);

        $surat = $suratRepository->findOneBySuratNumber('114');
        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratInterface', $surat);
    }

    public function testAddInitializers()
    {
        $suratRepositoryFactory = new SuratRepositoryFactory();

        $initializer1 = $this->getMock('Laraiba\Resource\Surat\Initializer\SuratInitializerInterface');
        $initializer2 = $this->getMock('Laraiba\Resource\Surat\Initializer\SuratInitializerInterface');

        $suratRepositoryFactory->addInitializer($initializer1);
        $suratRepositoryFactory->addInitializer($initializer2);

        $this->assertEquals(array($initializer1, $initializer2), $suratRepositoryFactory->getInitializers());
    }
}
