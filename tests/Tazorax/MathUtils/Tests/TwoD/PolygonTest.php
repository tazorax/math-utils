<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\Tests\TwoD;

use Tazorax\MathUtils\Exception;
use Tazorax\MathUtils\TwoD\Point2d;
use Tazorax\MathUtils\TwoD\Polygon;
use Tazorax\MathUtils\TwoD\Vector2d;

/**
 * Class PolygonTest
 * @package Tazorax\MathUtils\Tests\TwoD
 */
class PolygonTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
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
	 * @expectedException        Exception
	 * @expectedExceptionMessage This point doest not exist
	 */
	public function testGetPointException() {
		$p1 = new Polygon();
		$p1->getPoint(0);
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage It is not a polygon, missing points !
	 */
	public function testGetPerimeterException() {
		$p1 = new Polygon();
		$p1->getPerimeter();
	}

	/**
	 *
	 */
	public function testTranslate() {
		$p1 = new Polygon();
		$p1->addPoint(new Point2d(0, 0));
		$p1->addPoint(new Point2d(1, 1));
		$p1->addPoint(new Point2d(1, 2));
		$p1->addPoint(new Point2d(0, 3));
		$p1->addPoint(new Point2d(0, 4));

		$p2 = new Polygon();
		$p2->addPoint(new Point2d(2, 1));
		$p2->addPoint(new Point2d(3, 2));
		$p2->addPoint(new Point2d(3, 3));
		$p2->addPoint(new Point2d(2, 4));
		$p2->addPoint(new Point2d(2, 5));

		$this->assertTrue($p2->isEquals($p1->translate(new Vector2d(2, 1))));
		$this->assertFalse($p2->isEquals($p1->translate(new Vector2d(2, 2))));

		$p2->addPoint(new Point2d(1, 0));

		$this->assertFalse($p2->isEquals($p1->translate(new Vector2d(2, 1))));
	}
}
