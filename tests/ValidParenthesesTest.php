<?php

use John\LeetcodePhp\Solutions\validParentheses\ValidParentheses;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * To run tests execute PHPUnit via command:
 *      vendor/bin/phpunit tests/ValidParenthesesTest.php
 */
class ValidParenthesesTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testValidParentheses(string $parentheses, bool $expected) {
        $validParentheses = new ValidParentheses($parentheses);

        // Run test coverage
        $this->assertEquals($expected, $validParentheses->isValid($parentheses));
    }

    public static function inputProvider(): Generator {
        yield ["())", false];
        yield [")", false];
        yield ["()", true];
        yield ["()[]{}", true];
        yield ["(]", false];
        yield ["([])", true];
    }
}