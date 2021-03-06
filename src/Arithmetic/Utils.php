<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\Arithmetic;

/**
 * Class Utils
 *
 * @package Tazorax\MathUtils\Arithmetic
 */
class Utils
{
    /**
     * Calculate GCD between 2 integers
     *
     * @param int $n First integer
     * @param int $m Second integer
     * @return int GCD of first and second integer
     */
    public static function gcd($n, $m)
    {
        $n = abs($n);
        $m = abs($m);

        if ($n < $m) {
            list($m, $n) = [$n, $m];
        }

        if ($m == 0) {
            return $n;
        }

        $r = $n % $m;
        while ($r > 0) {
            $n = $m;
            $m = $r;
            $r = $n % $m;
        }

        return $m;
    }

    /**
     * Calculate LCM between 2 integers
     *
     * @param int $n First integer
     * @param int $m Second integer
     * @return int LCM of first and second integer
     */
    public static function lcm($n, $m)
    {
        return $m * ($n / self::gcd($n, $m));
    }

    /**
     * Calculate LCM from multiple integers
     *
     * @param int[] $numbers Integers array to calculate
     * @return int LCM of all integers
     */
    public static function lcmArray($numbers)
    {
        while (2 <= count($numbers)) {
            array_push($numbers, self::lcm(array_shift($numbers), array_shift($numbers)));
        }

        return reset($numbers);
    }
}
