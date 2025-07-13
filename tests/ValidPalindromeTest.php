<?php

use John\LeetcodePhp\solutions\validPalindrome\ValidPalindrome;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * To run tests execute PHPUnit via command:
 *      vendor/bin/phpunit tests/ValidPalindromeTest.php
 */
class ValidPalindromeTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testValidParentheses(string $input, bool $expected) {
        $validPalindrome = new ValidPalindrome($input);

        // Run test coverage
        $this->assertEquals($expected, $validPalindrome->isPalindrome($input));
    }

    public static function inputProvider(): Generator {
        yield ["A man, a plan, a canal: Panama", true];
        yield ["race a car", false];
        yield [" ", true];
    }
}