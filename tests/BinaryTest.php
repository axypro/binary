<?php
/**
 * @package axy\binary
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\binary\tests;

use axy\binary\Binary;

/**
 * coversDefaultClass axy\binary\Binary
 */
class BinaryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::getLength
     */
    public function testGetLength()
    {
        $this->assertSame(21, Binary::getLength('This is строка.'));
    }

    /**
     * covers ::getSlice
     */
    public function testGetSlice()
    {
        $string = 'This is строка.';
        $this->assertSame('is стр', Binary::getSlice($string, 5, 9));
        $this->assertSame('is строка.', Binary::getSlice($string, 5));
    }

    /**
     * covers ::getByteFromChar
     * @dataProvider providerGetByteFromChar
     * @param string $char
     * @param bool $signed
     * @param int $byte
     */
    public function testGetByteFromChar($char, $signed, $byte)
    {
        $this->assertSame($byte, Binary::getByteFromChar($char, $signed));
    }

    /**
     * @return array
     */
    public function providerGetByteFromChar()
    {
        return [
            ['a', false, 97],
            ['A', false, 65],
            ['A', true, 65],
            ['0', false, 48],
            [chr(200), false, 200],
            [chr(200), true, -56],
            [chr(255), true, -1],
            [chr(0), true, 0],
            [chr(0), false, 0],
            ['aA', false, 97],
        ];
    }

    /**
     * covers ::getByteFromString
     */
    public function testGetByteFromString()
    {
        $string = 'This is строка.';
        $this->assertSame(84, Binary::getByteFromString($string, 0));
        $this->assertSame(84, Binary::getByteFromString($string, 0, true));
        $this->assertSame(209, Binary::getByteFromString($string, 10));
        $this->assertSame(-47, Binary::getByteFromString($string, 10, true));
        $this->assertSame(0, Binary::getByteFromString($string, 100));
    }

    /**
     * covers ::unpackBytes
     */
    public function testUnpackBytes()
    {
        $string = 'This is строка.';
        $u = [84, 104, 105, 115, 32, 105, 115, 32, 209, 129, 209, 130, 209, 128, 208, 190, 208, 186, 208, 176, 46];
        $s = [84, 104, 105, 115, 32, 105, 115, 32, -47, -127, -47, -126, -47, 128, -48, -66, -48, -70, -48, -80, 46];
        $this->assertSame($u, Binary::unpackBytes($string));
        $this->assertSame($s, Binary::unpackBytes($string, true));
    }
}
