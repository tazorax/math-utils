<?php

namespace Tazorax\MathUtils\Tests\ThreeD;
use Tazorax\MathUtils\ThreeD\Point3d;
use Tazorax\MathUtils\ThreeD\Vector3d;

/**
 * Class Point3dTest
 * @package Tazorax\MathUtils\ThreeD
 */
class Point3dTest extends \PHPUnit_Framework_TestCase {
	/**
	 *
	 */
	public function testNew() {
		$p1 = new Point3d(1, 2, 3);
		$this->assertEquals(1, $p1->x);
		$this->assertEquals(2, $p1->y);
		$this->assertEquals(3, $p1->z);

		$p2 = new Point3d();
		$this->assertEquals(0, $p2->x);
		$this->assertEquals(0, $p2->y);
		$this->assertEquals(0, $p2->z);
	}

	/**
	 *
	 */
	public function testEquality() {
		$p1 = new Point3d(1, 2, 3);
		$p2 = new Point3d(1, 2, 3);

		$this->assertTrue($p1->equals($p2));

		$p3 = new Point3d(2, 2, 3);

		$this->assertFalse($p1->equals($p3));
	}

	/**
	 *
	 */
	public function testOperations() {
		$p1 = new Point3d(2, 4, 5);
		$p2 = new Point3d(1, 2, 2);
		$p3 = new Point3d(1, 2, 3);
		$p4 = new Point3d(1, 2, 3);
		$p5 = new Point3d(1, 7, 0);

		$v1 = new Vector3d(1, 2, 2);
		$v2 = new Vector3d(1, 2, 3);

		$this->assertTrue(Point3d::compareEquals($p3, $p4));
		$this->assertTrue($p3->equals($p4));
		$this->assertTrue($p3->equals(Point3d::subtract($p1, $v1)));
		$this->assertTrue($p1->equals(Point3d::add($p2, $v2)));

		$this->assertTrue(Vector3d::compareEquals($v2, Point3d::subtractP($p1, $p2)));

		$p1->offset(-1, 3, -5);

		$this->assertTrue($p1->equals($p5));
	}
}
