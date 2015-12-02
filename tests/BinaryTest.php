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
}
