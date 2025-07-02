<?php

namespace John\LeetcodePhp\Solutions\RomanToInt;

/**
 * Roman to Integer problem outline
 *
 * Roman numerals are represented by seven different symbols: I, V, X, L, C, D and M.
 *
 * Symbol       Value
 * I             1
 * V             5
 * X             10
 * L             50
 * C             100
 * D             500
 * M             1000
 *
 * For example, 2 is written as II in Roman numeral, just two ones added together. 12 is written as XII,
 *  which is simply X + II. The number 27 is written as XXVII, which is XX + V + II.
 *
 * Roman numerals are usually written largest to smallest from left to right. However, the numeral for four is not IIII.
 *  Instead, the number four is written as IV. Because the one is before the five we subtract it making four.
 *  The same principle applies to the number nine, which is written as IX. There are six instances where subtraction is used:
 *
 * I can be placed before V (5) and X (10) to make 4 and 9.
 * X can be placed before L (50) and C (100) to make 40 and 90.
 * C can be placed before D (500) and M (1000) to make 400 and 900.
 *
 * Given a roman numeral, convert it to an integer.
 *
 *
 * Example 1:
 *
 * Input: s = "III"
 * Output: 3
 * Explanation: III = 3.
 *
 * Example 2:
 *
 * Input: s = "LVIII"
 * Output: 58
 * Explanation: L = 50, V= 5, III = 3.
 *
 * Example 3:
 *
 * Input: s = "MCMXCIV"
 * Output: 1994
 * Explanation: M = 1000, CM = 900, XC = 90 and IV = 4.
 *
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 15
 * s (input) contains only the characters ('I', 'V', 'X', 'L', 'C', 'D', 'M').
 * It is guaranteed that s is a valid roman numeral in the range [1, 3999].
 */

class RomanToInt {
    public function romanToInt(string $input): int {
        // As the problem constraints does say s (input) are uppercase lets make sure they are uppercase
        $input = strtoupper($input);

        $romanNumbers = [
            "I" => 1,
            "V" => 5,
            "X" => 10,
            "L" => 50,
            "C" => 100,
            "D" => 500,
            "M" => 1000,
        ];

        $result = 0;
        $splitInput = str_split($input);
        $length = count($splitInput);


        for ($i = 0; $i < $length; $i++) {
            // Readability Variables
            $currentLetter = $splitInput[$i];
            $nextLetter = $splitInput[$i + 1];

            /**
             * Special cases
             *  I (1) before V (5) and X (10) thus we want to subtract 5 - 1 = 4 or 10 - 1 = 9
             *  X (10) before L (50) and C (100) thus we want to subtract 50 - 10 = 40 or 100 - 10 = 90
             *  C (100) before D (500) and M (1000) thus we want to subtract 500 - 100 = 400 or 1000 - 100 = 900
             */

            /**
             * If current letter is less than the next letter thus we want to subtrack according to the above special cases
             *  Example: IV -> I (1) is less than V (5) so we want to 5 - 1 to get 4
             *
             *  Since we just processed two numbers back to back we want to increment the index two spots
             */
            if ($romanNumbers[$currentLetter] < $romanNumbers[$nextLetter]) {
                $result += $romanNumbers[$nextLetter] - $romanNumbers[$currentLetter];
                $i++;
            } else {
                $result += $romanNumbers[$currentLetter];
            }
        }

        return $result;
    }
}