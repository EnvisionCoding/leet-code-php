<?php

namespace John\LeetcodePhp\solutions\validPalindrome;

/**
 * Valid Palindrome problem solution
 *
 * 125. Valid Palindrome
 * Solved
 * Easy
 * Topics
 * premium lock iconCompanies
 *
 * A phrase is a palindrome if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.
 *
 * Given a string s, return true if it is a palindrome, or false otherwise.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "A man, a plan, a canal: Panama"
 * Output: true
 * Explanation: "amanaplanacanalpanama" is a palindrome.
 *
 * Example 2:
 *
 * Input: s = "race a car"
 * Output: false
 * Explanation: "raceacar" is not a palindrome.
 *
 * Example 3:
 *
 * Input: s = " "
 * Output: true
 * Explanation: s is an empty string "" after removing non-alphanumeric characters.
 * Since an empty string reads the same forward and backward, it is a palindrome.
 *
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 2 * 105
 * s consists only of printable ASCII characters.
 */
class ValidPalindrome {
    public function isPalindrome(string $input): bool {
        // convert all input to lower case
        $normalizedString = strtolower($input);

        // Use regex to remove all non-alphameric characters
        $normalizedString = preg_replace("/[^a-z0-9]/", "", $normalizedString);

        // Early return if the normalized string is empty
        if (empty($normalizedString)) {
            return true;
        }

        // Reverse the whole string to compare
        $backwards = strrev($normalizedString);

        // Return true if the strings are the same else return false
        return $normalizedString === $backwards;
    }
}