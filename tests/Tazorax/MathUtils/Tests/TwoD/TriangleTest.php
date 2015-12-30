<?php

namespace Tazorax\MathUtils\Tests\TwoD;

use Tazorax\MathUtils\TwoD\Point2d;
use Tazorax\MathUtils\TwoD\Triangle;

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

		$this->assertTrue($pointA->isEquals($t1->getPointA()));
		$this->assertTrue($pointB->isEquals($t1->getPointB()));
		$this->assertTrue($pointC->isEquals($t1->getPointC()));

		$t2 = new Triangle($pointA, $pointB, $pointC);

		$pointD = new Point2d(1, 4);
		$pointE = new Point2d(2, 5);
		$pointF = new Point2d(3, 6);

		$t2->setPointA($pointD);
		$t2->setPointB($pointE);
		$t2->setPointC($pointF);

		$this->assertTrue($pointD->isEquals($t2->getPointA()));
		$this->assertTrue($pointE->isEquals($t2->getPointB()));
		$this->assertTrue($pointF->isEquals($t2->getPointC()));

		$this->assertEquals(3, $t1->pointsCount());
		$this->assertEquals(3, $t2->pointsCount());
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

		$this->assertEquals(12, $t1->getPerimeter());
		$this->assertEquals(7.2558328153369, $t2->getPerimeter());
		$this->assertEquals(5.8863495173727, $t3->getPerimeter());
		$this->assertEquals(3, $t4->getPerimeter());
		$this->assertEquals(5.1231056256177, $t5->getPerimeter());

	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage I am a triangle !
	 */
	public function testAddPointException() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 0);
		$pointD = new Point2d(5, 5);

		$t = new Triangle($pointA, $pointB, $pointC);
		$t->addPoint($pointD);
	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage I am a triangle !
	 */
	public function testSetPointException() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 0);
		$pointD = new Point2d(5, 5);

		$t = new Triangle($pointA, $pointB, $pointC);
		$t->setPoint(3, $pointD);
	}
}
