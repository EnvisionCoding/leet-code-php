<?php

use John\LeetcodePhp\solutions\integerToRoman\IntegerToRoman;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * To run tests execute PHPUnit via command:
 *      vendor/bin/phpunit tests/IntegerToRomanTest.php
 */
class IntegerToRomanTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testValidParentheses(int $input, string $expected) {
        $integerToRoman = new IntegerToRoman($input);

        // Run test coverage
        $this->assertEquals($expected, $integerToRoman->integerToRoman($input));
    }

    public static function inputProvider(): Generator {
        yield [3749, "MMMDCCXLIX"];
        yield [58, "LVIII"];
        yield [1994, "MCMXCIV"];
    }
}