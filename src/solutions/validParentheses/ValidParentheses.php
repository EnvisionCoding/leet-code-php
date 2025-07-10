<?php

namespace John\LeetcodePhp\Solutions\validParentheses;

use SplStack;

/**
 * Valid Parentheses problem outline
 *
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 *
 * An input string is valid if:
 *
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 * Every close bracket has a corresponding open bracket of the same type.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "()"
 *
 * Output: true
 *
 * Example 2:
 *
 * Input: s = "()[]{}"
 *
 * Output: true
 *
 * Example 3:
 *
 * Input: s = "(]"
 *
 * Output: false
 *
 * Example 4:
 *
 * Input: s = "([])"
 *
 * Output: true
 *
 *
 *
 * Constraints:
 *
 * 1 <= s.length <= 104
 * s consists of parentheses only '()[]{}'.
 */

class ValidParentheses
{
    /**
     * @param String $input
     * @return Boolean
     */
    function isValid(string $input): bool {
        // Based on given constraints - we can safely assume we have valid input so no need to check it

        $stack = new SplStack();

        $matchingParentheses = [
            ")" => "(",
            "}" => "{",
            "]" => "[",
        ];

        // substring (
        $splitInput = str_split($input);

        // Early return we have an uneven amount of parentheses thus we cannot have a valid set
        if (count($splitInput) % 2 != 0) {
            return false;
        }

        // Loop through all input characters
        for ($i = 0; $i < count($splitInput); $i++) {
            $currentCharacter = $splitInput[$i];

            /**
             * Check to see if the current character matches a key from the matched parentheses
             *   if the current character is a key that means we are dealing with a closing parentheses,
             *      thus we will need to:
             *          1. check for an early return if the stack is empty
             *          2. check to see if the top of the stack (an opening parentheses) is matching the current closing one
             *              if it isn't early return
             *              if it IS pop the opening parentheses off the stack and continue
             *  else the current character is an opening parentheses so we push it on to the stack
             */
            if (in_array($currentCharacter, array_keys($matchingParentheses))) {
                // Dealing with an ending parentheses

                // Stack doesn't have any opening parentheses thus we return early
                if ($stack->isEmpty()) {
                    return false;
                }

                /**
                 * Peek at the top of the stack and determine if the previous opening parentheses matches the current ending one
                 *   if not, early return as the set isn't a matching set
                 */
                if ($stack->top() !== $matchingParentheses[$currentCharacter]) {
                    return false;
                }

                // The set matched so we can pop / remove the previous opening parentheses
                $stack->pop();
            } else {
                // Opening parentheses so push to the stack
                $stack->push($currentCharacter);
            }
        }

        // Final check, if stack is empty everything was valid else if any remain we had a missing closing parentheses
        return $stack->isEmpty();
    }
}