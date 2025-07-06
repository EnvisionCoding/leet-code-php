<?php

namespace John\LeetcodePhp\Solutions\longestCommonPrefix;

/**
 * Longest Common Prefix problem outline
 *
 * Write a function to find the longest common prefix string amongst an array of strings.
 *
 * If there is no common prefix, return an empty string "".
 *
 *
 *
 * Example 1:
 *
 * Input: strs = ["flower","flow","flight"]
 * Output: "fl"
 *
 * Example 2:
 *
 * Input: strs = ["dog","racecar","car"]
 * Output: ""
 * Explanation: There is no common prefix among the input strings.
 *
 *
 *
 * Constraints:
 *
 * 1 <= strs.length <= 200
 * 0 <= strs[i].length <= 200
 * strs[i] consists of only lowercase English letters if it is non-empty.
 */

class LongestCommonPrefix
{
    /**
     * Finds the longest common prefix in an array of strings.
     *  Sorts given array like a dictionary to simplify finding common prefixes.
     *
     * @param array $strings
     * @return string
     */
    public function LongestCommonPrefix(array $strings): string
    {
        // Define default return parameter
        $prefix = "";

        /**
         * A quite optimal way to reduce complexity is to use the build in sort() function of PHP
         *
         * This method sorts a given array lexicographically thus we only need to check the first and last strings
         *      - lexicographically basically means sorted in dictionary order
         *      - sort compares character by character in a string array and moves the position of a string if the
         *              currently compared characters need reordered [I.E:  a comes before b]
         *                  abc vs aav => aav would sort before abc
         *
         * Sorting the strings lexicographically guarantees that the most similar strings end up near each other (towards the end of the array)
         *      while the two most different strings are placed at the start and end of the array.
         *          Meaning we can just compare the starting word and ending word to determine the longest common prefix
         *          (Note): if the starting string and ending string share a common prefix that means every strings between
         *              the two also start with the prefix
         */
        sort($strings, SORT_STRING);

        // Readability Variables
        $firstString = $strings[0];
        $lastString = end($strings);
        $lengthOfFirstString = strlen($firstString);

        /**
         * Strings are sorted so we check as many characters of each string as we can.
         *      if the starting string has less characters than the last string that means the absolute most common
         *          prefix's length is the length of the first strings character count.
         *
         *  Check each character each string one by one and if they are the same concat them to the return variable "prefix"
         */
        for ($i = 0; $i < $lengthOfFirstString; $i++) {
            if (substr($firstString, $i, 1) === substr($lastString, $i, 1)) {
                $prefix .= substr($firstString, $i, 1);
            } else {
                return $prefix;
            }
        }

        return $prefix;
    }
}