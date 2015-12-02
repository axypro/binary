<?php
/**
 * @package axy\binary
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\binary;

/**
 * Binary string
 */
class Binary
{
    /**
     * Returns the number of bytes
     *
     * @param string $string
     * @return int
     */
    public static function getLength($string)
    {
        if (self::checkMB()) {
            return mb_strlen($string, '8bit');
        }
        return strlen($string);
    }

    /**
     * @return bool
     */
    private static function checkMB()
    {
        if (self::$mbEnabled === null) {
            self::$mbEnabled = extension_loaded('mbstring');
        }
        return self::$mbEnabled;
    }

    /**
     * @var bool
     */
    private static $mbEnabled;
}
