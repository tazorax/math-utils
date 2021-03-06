<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\Tests\Arithmetic;

use PHPUnit\Framework\TestCase;
use Tazorax\MathUtils\Arithmetic\Utils;

/**
 * Class UtilsTest
 * @package Tazorax\MathUtils\Arithmetic
 */
class UtilsTest extends TestCase
{
    /**
     *
     */
    public function testGCD()
    {
        $this->assertEquals(1, Utils::gcd(1, 2));
        $this->assertEquals(1, Utils::gcd(-1, 2));
        $this->assertEquals(1, Utils::gcd(1, -2));
        $this->assertEquals(1, Utils::gcd(-1, -2));

        $this->assertEquals(1, Utils::gcd(4, 7));
        $this->assertEquals(4, Utils::gcd(4, 8));
    }

    /**
     *
     */
    public function testLCM()
    {
        $this->assertEquals(2, Utils::lcm(1, 2));
        $this->assertEquals(-2, Utils::lcm(-1, 2));
        $this->assertEquals(-2, Utils::lcm(1, -2));
        $this->assertEquals(2, Utils::lcm(-1, -2));

        $this->assertEquals(28, Utils::lcm(4, 7));
        $this->assertEquals(8, Utils::lcm(4, 8));
    }

    /**
     *
     */
    public function testLCMArray()
    {
        $this->assertEquals(2, Utils::lcmArray([1, 2]));
        $this->assertEquals(-2, Utils::lcmArray([-1, 2]));
        $this->assertEquals(-2, Utils::lcmArray([1, -2]));
        $this->assertEquals(2, Utils::lcmArray([-1, -2]));

        $this->assertEquals(28, Utils::lcmArray([4, 7]));
        $this->assertEquals(8, Utils::lcmArray([4, 8]));

        $this->assertEquals(6, Utils::lcmArray([1, 2, 3]));
        $this->assertEquals(-6, Utils::lcmArray([-1, 2, 3]));
        $this->assertEquals(-6, Utils::lcmArray([1, -2, 3]));
        $this->assertEquals(-6, Utils::lcmArray([-1, -2, -3]));

        $this->assertEquals(28, Utils::lcmArray([4, 7, 4]));
        $this->assertEquals(24, Utils::lcmArray([4, 8, 3]));
    }
}
