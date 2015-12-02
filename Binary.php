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
     * Returns a slice of a string
     *
     * @param string $string
     * @param int $offset
     * @param int $length [optional]
     * @return string
     */
    public static function getSlice($string, $offset, $length = null)
    {
        if (self::checkMB()) {
            return mb_substr($string, $offset, $length, '8bit');
        }
        if ($length === null) {
            $length = strlen($string);
        }
        return substr($string, $offset, $length);
    }

    /**
     * Returns a (signed|unsigned) byte from a char
     *
     * @param string $char
     * @param bool $signed [optional]
     * @return int
     */
    public static function getByteFromChar($char, $signed = false)
    {
        $byte = ord($char);
        if ($signed) {
            if ($byte > 128) {
                $byte = $byte - 256;
            }
        }
        return $byte;
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
