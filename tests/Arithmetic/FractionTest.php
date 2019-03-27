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

use Tazorax\MathUtils\Arithmetic\Fraction;
use Tazorax\MathUtils\Exception;

/**
 * Class FractionTest
 * @package Tazorax\MathUtils\Arithmetic
 */
class FractionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testNew()
    {
        $f1 = new Fraction(1, 2);

        $this->assertEquals(1, $f1->numerator);
        $this->assertEquals(2, $f1->denominator);

        $f2 = new Fraction();

        $this->assertEquals(0, $f2->numerator);
        $this->assertEquals(0, $f2->denominator);
    }

    /**
     *
     */
    public function testSimplify()
    {
        $f1 = new Fraction(1, 2);
        $f1->simplify();

        $this->assertEquals(1, $f1->numerator);
        $this->assertEquals(2, $f1->denominator);

        $f2 = new Fraction(-12, 18);
        $f3 = $f2->simplify();

        $this->assertEquals(-2, $f3->numerator);
        $this->assertEquals(3, $f3->denominator);

        $f4 = new Fraction(1, 0);
        $f5 = $f4->simplify();

        $this->assertEquals(1, $f5->numerator);
        $this->assertEquals(0, $f5->denominator);
    }

    /**
     *
     */
    public function testFloatValue()
    {
        $f1 = new Fraction(1, 2);

        $this->assertEquals(0.5, $f1->floatValue());
    }

    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Denominator is 0, can't divide by 0
     */
    public function testFloatValueException()
    {
        $f1 = new Fraction(1, 0);
        $f1->floatValue();
    }

    /**
     *
     */
    public function testFromFloat()
    {
        $f1 = new Fraction(1, 2);

        $this->assertEquals($f1, Fraction::getFromFloat(0.5));

        $f2 = new Fraction(1, 3);

        $this->assertEquals($f2, Fraction::getFromFloat(0.3333333));

        $this->assertEquals($f2, Fraction::getFromFloat(0.33, 1.e-1));
        $this->assertEquals($f2, Fraction::getFromFloat(0.333, 1.e-2));
        $this->assertEquals($f2, Fraction::getFromFloat(0.3333, 1.e-3));
        $this->assertEquals($f2, Fraction::getFromFloat(0.33336, 1.e-4));
        $this->assertNotEquals($f2, Fraction::getFromFloat(0.33337, 1.e-4));

        $f3 = new Fraction(5, 3);

        $this->assertEquals($f3, Fraction::getFromFloat(1.6666667));
    }
}
