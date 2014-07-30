<?php

namespace LaraibaTest\Resource\Surat\Repository;

use Laraiba\Resource\Surat\Repository\SuratRepositoryInterface;
use Laraiba\Resource\Surat\Repository\ArraySuratRepository;

class ArraySuratRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOfSuratRepositoryInterface()
    {
        $repository = new ArraySuratRepository(array());
        $this->assertInstanceOf('Laraiba\Resource\Surat\Repository\SuratRepositoryInterface', $repository);
    }

    public function testFindAll()
    {
        $surat1 = $this->getMock('Laraiba\Resource\Surat\SuratInterface');
        $surat2 = $this->getMock('Laraiba\Resource\Surat\SuratInterface');

        $data['1'] = $surat1;
        $data['2'] = $surat2;

        $repository = new ArraySuratRepository($data);
        $this->assertEquals(array($surat1, $surat2), $repository->findAll());
    }

    public function testFindOneBySuratNumber()
    {
        $surat1 = $this->getMock('Laraiba\Resource\Surat\SuratInterface');
        $surat2 = $this->getMock('Laraiba\Resource\Surat\SuratInterface');

        $data['1'] = $surat1;
        $data['2'] = $surat2;

        $repository = new ArraySuratRepository($data);
        $this->assertSame($surat2, $repository->findOneBySuratNumber(2));
    }

    public function testFindOneBySuratNumberReturnNullIfNotFound()
    {
        $repository = new ArraySuratRepository(array());
        $this->assertNull($repository->findOneBySuratNumber(2));
    }
}
