<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use PHPUnit\Framework\Assert;

class Acceptance extends \Codeception\Module
{
    /**
     * Replacement for assertArraySubset() removed in PHPUnit 9.
     * Asserts that every key of $subset exists in $array with the same value (recursively).
     * @param array $subset
     * @param array $array
     * @param string $path
     */
    public function assertArraySubset(array $subset, array $array, $path = '')
    {
        foreach ($subset as $key => $value) {
            $keyPath = $path === '' ? (string) $key : "$path.$key";
            Assert::assertArrayHasKey($key, $array, "Missing key '$keyPath'");
            if (is_array($value) && is_array($array[$key])) {
                $this->assertArraySubset($value, $array[$key], $keyPath);
            } else {
                Assert::assertSame($value, $array[$key], "Value mismatch at '$keyPath'");
            }
        }
    }
}
