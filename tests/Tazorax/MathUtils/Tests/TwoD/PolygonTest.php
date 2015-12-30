<?php

namespace Tazorax\MathUtils\Tests\TwoD;
use Tazorax\MathUtils\TwoD\Point2d;
use Tazorax\MathUtils\TwoD\Polygon;

/**
 * Class PolygonTest
 * @package Tazorax\MathUtils\Tests\TwoD
 */
class PolygonTest extends \PHPUnit_Framework_TestCase {

	public function testNew() {
		$p1 = new Polygon();

		$this->assertEquals(0, $p1->pointsCount());

		$pt1 = new Point2d();
		$p1->addPoint($pt1);

		$this->assertEquals(1, $p1->pointsCount());

		$pt2 = new Point2d();
		$p1->setPoint(0, $pt2);

		$this->assertEquals(1, $p1->pointsCount());

		$pt3 = new Point2d();
		$p1->setPoint(1, $pt3);

		$this->assertTrue($p1->getPoint(1)->isEquals($pt3));
	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage This point doest not exist
	 */
	public function testGetPointException() {
		$p1 = new Polygon();
		$p1->getPoint(0);
	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage It is not a polygon, missing points !
	 */
	public function testGetPerimeterException() {
		$p1 = new Polygon();
		$p1->getPerimeter();
	}


}
