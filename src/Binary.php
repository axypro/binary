<?php

declare(strict_types=1);

namespace axy\binary;

/** Work with binary string */
class Binary
{
    /** Returns the number of bytes */
    public static function getLength(string $string): int
    {
        if (self::checkMB()) {
            return mb_strlen($string, '8bit');
        }
        return strlen($string);
    }

    /** Returns a slice of a string */
    public static function getSlice(string $string, int $offset, ?int $length = null): string
    {
        if (self::checkMB()) {
            return mb_substr($string, $offset, $length, '8bit');
        }
        if ($length === null) {
            $length = strlen($string);
        }
        return substr($string, $offset, $length);
    }

    /** Returns a (signed|unsigned) byte from a char */
    public static function getByteFromChar(string $char, bool $signed = false): int
    {
        $byte = ord($char);
        if ($signed) {
            if ($byte > 128) {
                $byte = $byte - 256;
            }
        }
        return $byte;
    }

    /** Returns a byte from a string */
    public static function getByteFromString(string $string, int $index, bool $signed = false): int
    {
        $char = self::getSlice($string, $index, 1);
        return self::getByteFromChar($char, $signed);
    }

    /** Convert a binary string to an array of bytes */
    public static function unpackBytes(string $string, bool $signed = false)
    {
        $bytes = [];
        $len = self::getLength($string);
        for ($i = 0; $i < $len; $i++) {
            $bytes[] = self::getByteFromString($string, $i, $signed);
        }
        return $bytes;
    }

    private static function checkMB(): bool
    {
        if (self::$mbEnabled === null) {
            self::$mbEnabled = extension_loaded('mbstring');
        }
        return self::$mbEnabled;
    }

    private static ?bool $mbEnabled = null;
}
