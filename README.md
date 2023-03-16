# axy\binary

Working with binary strings in PHP.
At the moment this package doesn't make much sense.
Used by some other packages.

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/binary.svg?style=flat-square)](https://packagist.org/packages/axy/binary)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg?style=flat-square)](https://php.net/)
[![Tests](https://github.com/axypro/binary/actions/workflows/test.yml/badge.svg)](https://github.com/axypro/binary/actions/workflows/test.yml)
[![Coverage Status](https://coveralls.io/repos/github/axypro/binary/badge.svg?branch=master)](https://coveralls.io/github/axypro/binary?branch=master)
[![License](https://poser.pugx.org/axy/pbinary/license)](LICENSE)

### Documentation

Native string functions allow to work with text strings as with binary (a char is a byte).
The problem is that these functions can be overridden from mbstring.

The library uses mbstring functions with the charset `8bit`.
And native functions if mbstring is not enabled.

#### `Binary`

Class `axy\binary\Binary` with static methods.

* `getLength(string $string): int`
* `getSlice(string $string, int $offset [, int $length]): string`
* `getByteFromChar(string $char [, bool $signed = FALSE]): int`
* `getByteFromString(string $string, int $index [, bool $signed = FALSE]): int`
* `unpackBytes(string $string [, bool $signed = false]): int[]`
