<?php

use John\LeetcodePhp\Solutions\longestCommonPrefix\longestCommonPrefix;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * To run tests execute PHPUnit via command:
 *      vendor/bin/phpunit tests/LongestCommonPrefixTest.php
 */
class LongestCommonPrefixTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testLongestCommonPrefix(string $firstWord, string $secondWord, string $thirdWord, string $expected): void {
        $longestCommonPrefix = new LongestCommonPrefix();

        $inputArray = [
            $firstWord,
            $secondWord,
            $thirdWord
        ];

        // Test case 1
        $this->assertEquals($expected, $longestCommonPrefix->LongestCommonPrefix($inputArray));

        // Test case 2
        $this->assertEquals($expected, $longestCommonPrefix->LongestCommonPrefix($inputArray));

        // Test case 3
        $this->assertEquals($expected, $longestCommonPrefix->LongestCommonPrefix($inputArray));
    }

    public static function inputProvider(): Generator {
        yield (["flower","flow","flight", "fl"]);
        yield ["dog","racecar","car", ""];
    }
}