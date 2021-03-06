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

use Tazorax\MathUtils\Exception;

/**
 * Class representing a fraction number
 *
 * @package Tazorax\MathUtils\Arithmetic
 */
class Fraction
{
    /**
     * Numerator
     *
     * @var int
     */
    public $numerator;
    /**
     * Denominator
     *
     * @var int
     */
    public $denominator;

    /**
     * Fraction constructor.
     *
     * @param int $numerator Numerator
     * @param int $denominator Denominator
     */
    public function __construct($numerator = 0, $denominator = 0)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    /**
     * Simplify this fraction
     *
     * @return Fraction
     */
    public function simplify()
    {
        $g = Utils::gcd($this->numerator, $this->denominator);

        return new self($this->numerator / $g, $this->denominator / $g);
    }

    /**
     * Give a float representation of this fraction
     *
     * @return float
     * @throws Exception
     */
    public function floatValue()
    {
        if ($this->denominator === 0) {
            throw new Exception('Denominator is 0, can\'t divide by 0');
        }

        return $this->numerator / $this->denominator;
    }

    /**
     * Create an instance of Fraction from a float value
     *
     * @param float $value Value to convert
     * @param float $tolerance Tolerance (1.e-6 if omitted)
     * @return Fraction
     */
    public static function getFromFloat($value, $tolerance = 1.e-6)
    {
        $numerator = 1;
        $denominator = 0;
        $h2 = 0;
        $k2 = 1;
        $b = 1 / $value;
        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $numerator;
            $numerator = $a * $numerator + $h2;
            $h2 = $aux;
            $aux = $denominator;
            $denominator = $a * $denominator + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($value - $numerator / $denominator) > $value * $tolerance);

        return new self((int)$numerator, (int)$denominator);
    }
}
