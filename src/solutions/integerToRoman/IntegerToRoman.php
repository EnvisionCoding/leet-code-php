<?php

namespace John\LeetcodePhp\solutions\integerToRoman;

/**
 * 12. Integer to Roman
 * Medium
 * Topics
 * premium lock iconCompanies
 *
 * Seven different symbols represent Roman numerals with the following values:
 * Symbol    Value
 * I    1
 * V    5
 * X    10
 * L    50
 * C    100
 * D    500
 * M    1000
 *
 * Roman numerals are formed by appending the conversions of decimal place values from highest to lowest. Converting a decimal place value into a Roman numeral has the following rules:
 *
 * If the value does not start with 4 or 9, select the symbol of the maximal value that can be subtracted from the input, append that symbol to the result, subtract its value, and convert the remainder to a Roman numeral.
 * If the value starts with 4 or 9 use the subtractive form representing one symbol subtracted from the following symbol, for example, 4 is 1 (I) less than 5 (V): IV and 9 is 1 (I) less than 10 (X): IX. Only the following subtractive forms are used: 4 (IV), 9 (IX), 40 (XL), 90 (XC), 400 (CD) and 900 (CM).
 * Only powers of 10 (I, X, C, M) can be appended consecutively at most 3 times to represent multiples of 10. You cannot append 5 (V), 50 (L), or 500 (D) multiple times. If you need to append a symbol 4 times use the subtractive form.
 *
 * Given an integer, convert it to a Roman numeral.
 *
 *
 *
 * Example 1:
 *
 * Input: num = 3749
 *
 * Output: "MMMDCCXLIX"
 *
 * Explanation:
 *
 * 3000 = MMM as 1000 (M) + 1000 (M) + 1000 (M)
 * 700 = DCC as 500 (D) + 100 (C) + 100 (C)
 * 40 = XL as 10 (X) less of 50 (L)
 * 9 = IX as 1 (I) less of 10 (X)
 * Note: 49 is not 1 (I) less of 50 (L) because the conversion is based on decimal places
 *
 * Example 2:
 *
 * Input: num = 58
 *
 * Output: "LVIII"
 *
 * Explanation:
 *
 * 50 = L
 * 8 = VIII
 *
 * Example 3:
 *
 * Input: num = 1994
 *
 * Output: "MCMXCIV"
 *
 * Explanation:
 *
 * 1000 = M
 * 900 = CM
 * 90 = XC
 * 4 = IV
 *
 *
 *
 * Constraints:
 *
 * 1 <= num <= 3999
 */
class IntegerToRoman {
    public function integerToRoman(int $input): string {
        $result = ""; //String to build from int input

        // Map integers to related roman numbers
        $romanNumbers = [
            1000 => "M",
             500 => "D",
             100 => "C",
              50 => "L",
              10 => "X",
               5 => "V",
               1 => "I",
        ];

        /**
         * Loop until the given input is 0 (1 included, 0 excluded)
         *   Decrement input as we go by:
         *     1. Determining the quotient (number of times the current input value can be divided by a given roman literal)
         *       Example -> 3999 / 1000 = 3 (remainder is 999)
         *     2. Append the corresponding roman literal by he quotient
         *       Example -> quotient = 3 -> Append 3 M's to get MMM
         *     3. Subtract the input by the value of the quotient multiplied by the integer value of the roman literals we appended
         *       Example -> 3 * 1000 = 3000 so we subtract 3999 by 3000 and have 999 remaining to continue to be processed.
         *
         *   Note: We also account for the edge cases where you order the smallest by largest
         */
        while ($input > 0) {
            if ($input >= 1000) {
                $quotient = intdiv($input, 1000);

                $result .= str_repeat($romanNumbers[1000], $quotient);

                $input -= $quotient * 1000;
                continue;
            }

            if ($input >= 900) {
                $quotient = intdiv($input, 900);

                $result .= str_repeat("CM", $quotient);

                $input -= $quotient * 900;
                continue;
            }

            if ($input >= 500) {
                $quotient = intdiv($input, 500);

                $result .= str_repeat($romanNumbers[500], $quotient);

                $input -= $quotient * 500;
                continue;
            }

            if ($input >= 400) {
                $quotient = intdiv($input, 400);

                $result .= str_repeat("CD", $quotient);

                $input -= $quotient * 400;
                continue;
            }

            if ($input >= 100) {
                $quotient = intdiv($input, 100);

                $result .= str_repeat($romanNumbers[100], $quotient);

                $input -= $quotient * 100;
                continue;
            }

            if ($input >= 90) {
                $quotient = intdiv($input, 90);

                $result .= str_repeat("XC", $quotient);

                $input -= $quotient * 90;
                continue;
            }

            if ($input >= 50) {
                $quotient = intdiv($input, 50);

                $result .= str_repeat($romanNumbers[50], $quotient);

                $input -= $quotient * 50;
                continue;
            }

            if ($input >= 40) {
                $quotient = intdiv($input, 40);

                $result .= str_repeat("XL", $quotient);

                $input -= $quotient * 40;
                continue;
            }

            if ($input >= 10) {
                $quotient = intdiv($input, 10);

                $result .= str_repeat($romanNumbers[10], $quotient);

                $input -= $quotient * 10;
                continue;
            }

            if ($input >= 9) {
                $quotient = intdiv($input, 9);

                $result .= str_repeat("IX", $quotient);

                $input -= $quotient * 9;
                continue;
            }

            if ($input >= 5) {
                $quotient = intdiv($input, 5);

                $result .= str_repeat($romanNumbers[5], $quotient);

                $input -= $quotient * 5;
                continue;
            }

            if ($input >= 4) {
                $quotient = intdiv($input, 4);

                $result .= str_repeat("IV", $quotient);

                $input -= $quotient * 4;
                continue;
            }

            $quotient = intdiv($input, 1);
            $result .= str_repeat($romanNumbers[1], $quotient);
            $input -= $quotient;
        }

        return $result;
    }
}