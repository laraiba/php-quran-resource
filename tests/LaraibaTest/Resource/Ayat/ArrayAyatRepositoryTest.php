<?php

namespace LaraibaTest\Resource\Ayat;

use Laraiba\Resource\Ayat\AyatRepositoryInterface;
use Laraiba\Resource\Ayat\ArrayAyatRepository;

class ArrayAyatRepositoryTest extends \PHPUnit_Framework_TestCase
{
    protected $repository;

    public function setUp()
    {
        $this->repository = new ArrayAyatRepository(array());
    }

    public function testInstanceOfAyatRepositoryInterface()
    {
        $this->assertInstanceOf('Laraiba\Resource\Ayat\AyatRepositoryInterface', $this->repository);
    }

    public function testFindAll()
    {
        $ayat = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');
        $data['1']['1'] = $ayat;

        $this->repository = new ArrayAyatRepository($data);
        $this->assertEquals(array($ayat), $this->repository->findAll());
    }

    public function testFindBySuratNumber()
    {
        $ayat1 = $this->getAyatMock('2:1');
        $ayat2 = $this->getAyatMock('2:2');
        $ayat3 = $this->getAyatMock('3:7');

        $data['2']['1'] = $ayat1;
        $data['2']['2'] = $ayat2;
        $data['3']['7'] = $ayat3;

        $repository = new ArrayAyatRepository($data);
        $this->assertEquals(array($ayat1, $ayat2), $repository->findBySuratNumber('2'));
    }

    public function testFindBySuratNumberReturnEmptyArrayIfNotFound()
    {
        $repository = new ArrayAyatRepository(array());
        $this->assertEquals(array(), $repository->findBySuratNumber('20'));
    }

    public function testFindOneById()
    {
        $ayat = $this->getAyatMock('5:11');
        $data['5']['11'] = $ayat;

        $repository = new ArrayAyatRepository($data);
        $this->assertSame($ayat, $repository->findOneById($ayat->getId()));
    }

    public function testFindOneByIdReturnNullIfNotFound()
    {
        $repository = new ArrayAyatRepository(array());

        $ayat = $this->getAyatMock('29:150');
        $this->assertNull($repository->findOneById($ayat->getId()));
    }

    protected function getAyatMock($idValue)
    {
        $ayatId = $this->getMockBuilder('Laraiba\Resource\Ayat\AyatId')->disableOriginalConstructor()->getMock();
        $ayatId->method('getValue')->willReturn($idValue);
        $ayatId->method('__toString')->willReturn($idValue);

        $ayat = $this->getMock('Laraiba\Resource\Ayat\AyatInterface');
        $ayat->method('getId')->willReturn($ayatId);

        return $ayat;
    }
}
