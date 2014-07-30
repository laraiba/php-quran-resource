<?php

namespace LaraibaTest\Resource\Ayat;

use Laraiba\Resource\Ayat\AyatId;

class AyatIdTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValidValue()
    {
        $this->assertTrue(AyatId::isValid('2:10'));
        $this->assertTrue(AyatId::isValid('02:10'));
        $this->assertFalse(AyatId::isValid('02'));
        $this->assertFalse(AyatId::isValid('abc'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid Ayat Id was given. The accepted format is number:number, eg. 2:10.
     */
    public function testConstructThrowsExceptionOnInvalidParameter()
    {
        new AyatId('abc');
    }

    public function testConstructPreserveValue()
    {
        $ayatId = new AyatId('3:20');
        $this->assertEquals('3:20', $ayatId->getValue());
        $this->assertEquals('3:20', (string) $ayatId);
    }

    /**
     * @depends testConstructPreserveValue
     */
    public function testAyatIdImplementsAyatIdInterface()
    {
        $ayatId = new AyatId('4:5');
        $this->assertInstanceOf('Laraiba\Resource\Ayat\AyatIdInterface', $ayatId);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSplitValueThrowsExceptionOnInvalidArgument()
    {
        AyatId::splitValue('abcdef');
    }

    public function testSplitValueReturnArray()
    {
        $id = '2:255';
        $expected = array(
            'surat_number' => 2,
            'ayat_number'  => 255,
        );

        $this->assertEquals($expected, AyatId::splitValue($id));
    }
}
