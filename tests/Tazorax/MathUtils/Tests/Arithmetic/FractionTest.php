<?php

namespace Tazorax\MathUtils\Tests\Arithmetic;

use Tazorax\MathUtils\Arithmetic\Fraction;

/**
 * Class FractionTest
 * @package Tazorax\MathUtils\Arithmetic
 */
class FractionTest extends \PHPUnit_Framework_TestCase {
	/**
	 *
	 */
	public function testNew() {
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
	public function testSimplify() {
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
	public function testFloatValue() {
		$f1 = new Fraction(1, 2);

		$this->assertEquals(0.5, $f1->floatValue());
	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage Denominator is 0, can't divide by 0
	 */
	public function testFloatValueException() {
		$f1 = new Fraction(1, 0);
		$f1->floatValue();
	}
}
