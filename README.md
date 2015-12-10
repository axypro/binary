# axy\binary

Working with binary strings.

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/binary.svg?style=flat-square)](https://packagist.org/packages/axy/binary)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Build Status](https://img.shields.io/travis/axypro/binary/master.svg?style=flat-square)](https://travis-ci.org/axypro/binary)
[![Coverage Status](https://coveralls.io/repos/axypro/binary/badge.svg?branch=master&service=github)](https://coveralls.io/github/axypro/binary?branch=master)
[![License](https://poser.pugx.org/axy/binary/license)](LICENSE)

* The library does not require any dependencies.
* Tested on PHP 5.4+, PHP 7, HHVM (on Linux), PHP 5.5 (on Windows).
* Install: `composer require axy/binary`.
* License: [MIT](LICENSE).

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
