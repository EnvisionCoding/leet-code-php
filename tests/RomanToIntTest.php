<?php

use John\LeetcodePhp\Solutions\RomanToInt\RomanToInt;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * To run tests execute PHPUnit via command:
 *      vendor/bin/phpunit tests/RomanToIntTest.php
 */
class RomanToIntTest extends TestCase {

    #[DataProvider('inputProvider')]
    public function testRomanToInt(string $input, int $expected): void {
        $romanToInt = new RomanToInt($input);

        // Test case 1
        $this->assertEquals($expected, $romanToInt->romanToInt($input));

        // Test case 2
        $this->assertEquals($expected, $romanToInt->romanToInt($input));

        // Test case 3
        $this->assertEquals($expected, $romanToInt->romanToInt($input));
    }

    public static function inputProvider(): Generator {
        yield ["III", 3];
        yield ["LVIII", 58];
        yield ["MCMXCIV", 1994];
    }
}
