<?php

declare(strict_types=1);

namespace axy\binary\examples;

require_once __DIR__ . '/../index.php';

use axy\binary\Binary;

$args = array_slice($_SERVER['argv'], 1);
if (empty($args)) {
    $args[] = 'This is string';
}

foreach ($args as $str) {
    echo "Binary::getLength($str) = " . Binary::getLength($str) . PHP_EOL;
    echo "Binary::getLength($str, 2, 3) = " . Binary::getSlice($str, 2, 3) . PHP_EOL;
    echo "Binary::getLength($str, 3, signed) = " . Binary::getByteFromString($str, 3, true) . PHP_EOL;
    echo "Binary::getLength($str, 3, unsigned) = " . Binary::getByteFromString($str, 3, false) . PHP_EOL;
}
