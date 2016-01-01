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

		$this->assertTrue($p1->isEquals($p2));

		$p3 = new Point2d(2, 2);

		$this->assertFalse($p1->isEquals($p3));
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

		$this->assertTrue(Point2d::compareEquals($p3, $p4));
		$this->assertTrue($p3->isEquals($p4));
		$this->assertTrue($p3->isEquals(Point2d::subtract($p1, $v1)));
		$this->assertTrue($p1->isEquals(Point2d::add($p2, $v2)));

		$this->assertTrue(Vector2d::compareEquals($v2, Point2d::subtractP($p1, $p2)));

		$p1->offset(-1, -5);

		$this->assertTrue($p1->isEquals($p5));
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
}
