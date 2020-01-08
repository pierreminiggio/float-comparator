<?php

namespace PierreMiniggio\FloatComparatorTest;

use PHPUnit\Framework\TestCase;
use PierreMiniggio\FloatComparator\Comparator;

class ComparatorTest extends TestCase
{
    const EQUAL = 'both are equal';
    const SMALLER = 'a is smaller';
    const GREATER = 'a is greater';

    public function testABunchOfStuff()
    {
        $compator = new Comparator();
        $testCases = [
            ['a' => 1.000001, 'b' => 1, 'state' => static::EQUAL],
            ['a' => 1, 'b' => 1, 'state' => static::EQUAL],
            ['a' => 1, 'b' => 1.000011, 'state' => static::SMALLER],
            ['a' => 1, 'b' => 2, 'state' => static::SMALLER],
            ['a' => 1.000011, 'b' => 1, 'state' => static::GREATER],
            ['a' => 2, 'b' => 1, 'state' => static::GREATER]
        ];

        foreach ($testCases as $testCase) {
            $this->assertSame($compator->is($testCase['a'])->equalTo($testCase['b']), in_array($testCase['state'], [static::EQUAL]));
            $this->assertSame($compator->is($testCase['a'])->greaterThan($testCase['b']), in_array($testCase['state'], [static::GREATER]));
            $this->assertSame($compator->is($testCase['a'])->smallerThan($testCase['b']), in_array($testCase['state'], [static::SMALLER]));
            $this->assertSame($compator->is($testCase['a'])->equalToOrGreaterThan($testCase['b']), in_array($testCase['state'], [static::EQUAL, static::GREATER]));
            $this->assertSame($compator->is($testCase['a'])->equalToOrSmallerThan($testCase['b']), in_array($testCase['state'], [static::EQUAL, static::SMALLER]));
        }

    }
}
