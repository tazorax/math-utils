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
 * Class representing a collection of Fraction objects
 *
 * @package Tazorax\MathUtils\Arithmetic
 */
class FractionCollection
{
    /**
     * Fractions array of this collection
     *
     * @var Fraction[]
     */
    public $fractions = [];

    /**
     * FractionCollection constructor.
     */
    public function __construct()
    {
        $this->fractions = [];
    }

    /**
     * Add a Fraction object to this collection
     *
     * @param Fraction $fraction
     * @return FractionCollection
     */
    public function addFraction(Fraction $fraction)
    {
        $this->fractions[] = $fraction;

        return $this;
    }

    /**
     * Reduce all fractions in this collection with a same denominator
     *
     * @return FractionCollection
     */
    public function simplify()
    {
        $simpleFractions = [];

        $denominators = [];

        // Simplify each fraction before
        foreach ($this->fractions as $fraction) {
            $newFraction = $fraction->simplify();
            $simpleFractions[] = $newFraction;
            $denominators[] = $newFraction->denominator;
        }

        // Find lcm denominator
        $denominator = Utils::lcmArray($denominators);

        $buffer = new self();

        foreach ($simpleFractions as $fraction) {
            // Set the fraction with found $denominator
            $newFraction = new Fraction($fraction->numerator * $denominator / $fraction->denominator, $denominator);
            $buffer->addFraction($newFraction);
        }

        return $buffer;
    }

    /**
     * Get sum
     *
     * @return Fraction
     */
    public function sum()
    {
        $result = new Fraction();
        $simplifiedCollection = $this->simplify();

        foreach ($simplifiedCollection->fractions as $fraction) {
            $result->numerator += $fraction->numerator;
            $result->denominator = $fraction->denominator;
        }

        return $result;
    }

    /**
     * Get multiplication
     *
     * @param bool $simplified
     * @return Fraction
     */
    public function multiplication($simplified = true)
    {
        $result = new Fraction(1, 1);


        foreach ($this->fractions as $fraction) {
            $result->numerator *= $fraction->numerator;
            $result->denominator *= $fraction->denominator;
        }

        if ($simplified) {
            $simplifiedCollection = new self();
            $simplifiedCollection->addFraction($result);

            return $simplifiedCollection->simplify()->fractions[0];
        }

        return $result;
    }
}
