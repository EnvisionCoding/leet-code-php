# LeetCode Solutions in PHP

This repository contains my solutions to various [LeetCode](https://leetcode.com/) problems written in **PHP**.
Each solution is organized by problem and includes corresponding **unit tests** to verify correctness and handle edge cases.

## 📁 Project Structure

````
/leetcode-php
├── src/
│   ├── solutions/ 
│       ├── leetcodeProblemDirectory/ (Each solution has its own folder for organization. Each solution also has complexity and results
│           ├── leetcodeProblem.php
│       └── ...
├── tests/
│ ├── specificSolutionTastcase.php
│ └── ...
├── composer.json
└── README.md
````

## 🧪 Running Tests

This project uses **PHPUnit** for testing. To run the tests:

1. Install dependencies using Composer:

```bash
    composer install
    
    Run all tests:
    
    vendor/bin/phpunit tests
    
    Run specific tets
    
    vendor/bin/phpunit tests/LeetCodeProblemNameTest.php
    
    Example:
    vendor/bin/phpunit tests/RomanToIntTest.php

```


Make sure you have PHP and Composer installed on your system.

## 📌 Notes

    Solutions aim for readability and performance.

    Test cases cover common inputs, edge cases, and potential error scenarios.

    Some problems may include multiple approaches (e.g., brute-force and optimized).

## 🧠 Why PHP?

While PHP isn't a common language for LeetCode, it's a great way to sharpen algorithmic thinking using a backend-focused language. This also serves as a learning resource for those interested in data structures and algorithms in PHP.