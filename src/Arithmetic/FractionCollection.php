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
        $simple_fractions = [];

        $denominators = [];

        // Simplify each fraction before
        foreach ($this->fractions as $fraction) {
            $new_fraction = $fraction->simplify();
            $simple_fractions[] = $new_fraction;
            $denominators[] = $new_fraction->denominator;
        }

        // Find lcm denominator
        $denominator = Utils::lcmArray($denominators);

        $buffer = new self();

        foreach ($simple_fractions as $fraction) {
            // Set the fraction with found $denominator
            $new_fraction = new Fraction($fraction->numerator * $denominator / $fraction->denominator, $denominator);
            $buffer->addFraction($new_fraction);
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
        $simplified_collection = $this->simplify();

        foreach ($simplified_collection->fractions as $fraction) {
            $result->numerator += $fraction->numerator;
            $result->denominator = $fraction->denominator;
        }

        return $result;
    }
}
