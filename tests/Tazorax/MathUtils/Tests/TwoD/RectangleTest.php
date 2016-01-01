<?php

namespace Tazorax\MathUtils\Tests\TwoD;

use Tazorax\MathUtils\Exception;
use Tazorax\MathUtils\TwoD\Point2d;
use Tazorax\MathUtils\TwoD\Rectangle;

/**
 * Class RectangleTest
 * @package Tazorax\MathUtils\Tests\TwoD
 */
class RectangleTest extends \PHPUnit_Framework_TestCase {

	public function testNew() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 4);
		$pointD = new Point2d(3, 0);

		$r = new Rectangle($pointA, $pointB, $pointC, $pointD);

		$this->assertTrue($pointA->isEquals($r->getPointA()));
		$this->assertTrue($pointB->isEquals($r->getPointB()));
		$this->assertTrue($pointC->isEquals($r->getPointC()));
		$this->assertTrue($pointD->isEquals($r->getPointD()));

		$this->assertEquals(14, $r->getPerimeter());
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage Points must be draw a rectangle !
	 */
	public function testNewException() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 4);
		$pointD = new Point2d(3, 1);

		new Rectangle($pointA, $pointB, $pointC, $pointD);
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage I am a rectangle !
	 */
	public function testAddPointException() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 4);
		$pointD = new Point2d(3, 0);
		$pointE = new Point2d(5, 5);

		$r = new Rectangle($pointA, $pointB, $pointC, $pointD);
		$r->addPoint($pointE);
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage I am a rectangle !
	 */
	public function testSetPointException() {
		$pointA = new Point2d(0, 0);
		$pointB = new Point2d(0, 4);
		$pointC = new Point2d(3, 4);
		$pointD = new Point2d(3, 0);
		$pointE = new Point2d(5, 5);

		$r = new Rectangle($pointA, $pointB, $pointC, $pointD);
		$r->setPoint(4, $pointE);
	}
}
