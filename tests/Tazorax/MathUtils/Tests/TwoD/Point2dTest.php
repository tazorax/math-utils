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
use Tazorax\MathUtils\TwoD\Vector2d;

/**
 * Class Point2dTest
 * @package Tazorax\MathUtils\TwoD
 */
class Point2dTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testNew() {
		$p1 = new Point2d(1, 2);
		$this->assertEquals(1, $p1->x);
		$this->assertEquals(2, $p1->y);

		$p2 = new Point2d();
		$this->assertEquals(0, $p2->x);
		$this->assertEquals(0, $p2->y);
	}

	/**
	 *
	 */
	public function testEquality() {
		$p1 = new Point2d(1, 2);
		$p2 = new Point2d(1, 2);

		$this->assertEquals($p1, $p2);

		$p3 = new Point2d(2, 2);

		$this->assertNotEquals($p1, $p3);
	}

	/**
	 *
	 */
	public function testOperations() {
		$p1 = new Point2d(2, 5);
		$p2 = new Point2d(1, 2);
		$p3 = new Point2d(1, 3);
		$p4 = new Point2d(1, 3);
		$p5 = new Point2d(1, 0);

		$v1 = new Vector2d(1, 2);
		$v2 = new Vector2d(1, 3);

		$this->assertEquals($p3, $p4);
		$this->assertEquals($p3, Point2d::subtract($p1, $v1));
		$this->assertEquals($p1, Point2d::add($p2, $v2));

		$this->assertEquals($v2, Point2d::subtractP($p1, $p2));

		$p1->offset(-1, -5);

		$this->assertEquals($p1, $p5);
	}

	/**
	 *
	 */
	public function testDistance() {
		$p1 = new Point2d(1, 5);
		$p2 = new Point2d(1, 2);

		$this->assertEquals(3, $p1->distanceFrom($p2));

		$p3 = new Point2d(5, 5);
		$this->assertEquals(4, $p1->distanceFrom($p3));

		$p4 = new Point2d(5, 1);
		$this->assertEquals(5.6568542494924, $p1->distanceFrom($p4));
	}

	/**
	 *
	 */
	public function testGetAngle() {
		$p1 = new Point2d(0, 0);
		$p2 = new Point2d(0, 5);
		$p3 = new Point2d(5, 0);

		$this->assertEquals(deg2rad(90), Point2d::getAngle($p1, $p2, $p3));
		$this->assertEquals(deg2rad(90), Point2d::getAngle($p1, $p3, $p2));
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage Points must be different than the center point!
	 */
	public function testGetAngleException() {
		$p1 = new Point2d(0, 0);
		$p2 = new Point2d(0, 0);
		$p3 = new Point2d(0, 3);

		Point2d::getAngle($p1, $p2, $p3);
	}
}
