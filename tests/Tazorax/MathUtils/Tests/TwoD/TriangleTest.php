<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class TriangleTest
 * @package Tazorax\MathUtils\TwoD
 */
class TriangleTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testNew() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 0);

		$t1 = new Triangle($pointA, $pointB, $pointC);

		$this->assertTrue($pointA->equals($t1->getPointA()));
		$this->assertTrue($pointB->equals($t1->getPointB()));
		$this->assertTrue($pointC->equals($t1->getPointC()));

		$t2 = new Triangle($pointA, $pointB, $pointC);

		$pointD = new Point2d(1, 4);
		$pointE = new Point2d(2, 5);
		$pointF = new Point2d(3, 6);

		$t2->setPointA($pointD);
		$t2->setPointB($pointE);
		$t2->setPointC($pointF);

		$this->assertTrue($pointD->equals($t2->getPointA()));
		$this->assertTrue($pointE->equals($t2->getPointB()));
		$this->assertTrue($pointF->equals($t2->getPointC()));
	}

	/**
	 *
	 */
	public function testSides() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 0);

		$t1 = new Triangle($pointA, $pointB, $pointC);

		$this->assertEquals(Triangle::BC_SIDE, $t1->getHighSide());

		$this->assertTrue($t1->isRight());
		$this->assertFalse($t1->isIsosceles());
		$this->assertFalse($t1->isEquilateral());

		$pointD = new Point2d(1, 4);
		$pointE = new Point2d(2, 5);
		$pointF = new Point2d(3, 7);

		$t2 = new Triangle($pointD, $pointE, $pointF);

		$this->assertEquals(Triangle::AC_SIDE, $t2->getHighSide());
		$this->assertFalse($t2->isRight());
		$this->assertFalse($t2->isIsosceles());
		$this->assertFalse($t2->isEquilateral());

		$pointG = new Point2d(1, 4);
		$pointH = new Point2d(2, 6);
		$pointI = new Point2d(3, 5);

		$t3 = new Triangle($pointG, $pointH, $pointI);

		$this->assertEquals(Triangle::AB_SIDE, $t3->getHighSide());

		$pointJ = new Point2d(0, 0);
		$pointK = new Point2d(0, 1);
		$pointL = new Point2d(sqrt(3) / 2, 0.5);

		$t4 = new Triangle($pointJ, $pointK, $pointL);

		$this->assertFalse($t4->isRight());
		$this->assertTrue($t4->isIsosceles());
		$this->assertTrue($t4->isEquilateral());

		$pointM = new Point2d(0, 0);
		$pointN = new Point2d(0, 1);
		$pointO = new Point2d(2, 0.5);

		$t5 = new Triangle($pointM, $pointN, $pointO);

		$this->assertFalse($t5->isRight());
		$this->assertTrue($t5->isIsosceles());
		$this->assertFalse($t5->isEquilateral());

		$this->assertEquals(6, $t1->getArea());
		$this->assertEquals(0.5, $t2->getArea());
		$this->assertEquals(1.5, $t3->getArea());
		$this->assertEquals(0.43301270189222, $t4->getArea());
		$this->assertEquals(1, $t5->getArea());

	}
}
