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
}
