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
}
