<?php

namespace LaraibaTest\Resource\Surat;

use Laraiba\Resource\Surat\SuratRepositoryFactory;

class SuratRepositoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSuratRepository()
    {
        $suratRepositoryFactory = new SuratRepositoryFactory();

        $initializer1 = $this->getMock('Laraiba\Resource\Surat\SuratInitializerInterface');
        $suratRepositoryFactory->addInitializer($initializer1);

        $suratRepository = $suratRepositoryFactory->createSuratRepository();

        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratRepositoryInterface', $suratRepository);

        $surat = $suratRepository->findOneBySuratNumber('114');
        $this->assertInstanceOf('Laraiba\Resource\Surat\SuratInterface', $surat);
    }

    public function testAddInitializers()
    {
        $suratRepositoryFactory = new SuratRepositoryFactory();

        $initializer1 = $this->getMock('Laraiba\Resource\Surat\SuratInitializerInterface');
        $initializer2 = $this->getMock('Laraiba\Resource\Surat\SuratInitializerInterface');

        $suratRepositoryFactory->addInitializer($initializer1);
        $suratRepositoryFactory->addInitializer($initializer2);

        $this->assertEquals(array($initializer1, $initializer2), $suratRepositoryFactory->getInitializers());
    }
}
