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
use Tazorax\MathUtils\Arithmetic\Fraction;
use Tazorax\MathUtils\Arithmetic\FractionCollection;

/**
 * Class FractionCollectionTest
 * @package Tazorax\MathUtils\Arithmetic
 */
class FractionCollectionTest extends TestCase
{
    /**
     *
     */
    public function testNew()
    {
        $fc1 = new FractionCollection();
        $this->assertEquals(0, count($fc1->fractions));
        $this->assertEquals([], $fc1->fractions);

        $f1 = new Fraction(1, 2);
        $fc1->addFraction($f1);

        $this->assertEquals(1, count($fc1->fractions));
        $this->assertEquals([$f1], $fc1->fractions);
    }

    /**
     *
     */
    public function testSimplify()
    {
        $fc1 = new FractionCollection();

        $fc1->addFraction(new Fraction(1, 2));
        $fc1->addFraction(new Fraction(1, 4));
        $fc1->addFraction(new Fraction(1, 8));
        $fc1->addFraction(new Fraction(1, 8));
        $fc1->addFraction(new Fraction(4, 256));

        $this->assertEquals(5, count($fc1->fractions));

        $fc2 = $fc1->simplify();

        $this->assertEquals(5, count($fc2->fractions));

        $f1 = new Fraction(32, 64);
        $f2 = new Fraction(16, 64);
        $f3 = new Fraction(8, 64);
        $f4 = new Fraction(8, 64);
        $f5 = new Fraction(1, 64);

        $this->assertEquals([$f1, $f2, $f3, $f4, $f5], $fc2->fractions);
    }

    /**
     *
     */
    public function testSum()
    {
        $fc1 = new FractionCollection();

        $fc1->addFraction(new Fraction(1, 2));
        $fc1->addFraction(new Fraction(1, 4));
        $fc1->addFraction(new Fraction(1, 8));
        $fc1->addFraction(new Fraction(1, 8));
        $fc1->addFraction(new Fraction(4, 256));

        $this->assertEquals(5, count($fc1->fractions));

        $expected_sum = new Fraction(65, 64);
        $f = $fc1->sum();

        $this->assertEquals($expected_sum, $f);
    }

    /**
     *
     */
    public function testMultiplication()
    {
        $fc1 = new FractionCollection();

        $fc1->addFraction(new Fraction(1, 20));
        $fc1->addFraction(new Fraction(40, 100));

        $this->assertEquals(2, count($fc1->fractions));

        $expectedMultiplication1 = new Fraction(1, 50);
        $f = $fc1->multiplication();

        $this->assertEquals($expectedMultiplication1, $f);

        $expectedMultiplication2 = new Fraction(40, 2000);
        $f = $fc1->multiplication(false);

        $this->assertEquals($expectedMultiplication2, $f);


    }
}
