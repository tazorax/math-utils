<?php

namespace Tazorax\MathUtils\ThreeD;

/**
 * Class Vector3dTest
 * @package Tazorax\MathUtils\ThreeD
 */
class Vector3dTest extends \PHPUnit_Framework_TestCase {
	/**
	 *
	 */
	public function testNew() {
		$v1 = new Vector3d(1, 2, 3);
		$this->assertEquals(1, $v1->x);
		$this->assertEquals(2, $v1->y);
		$this->assertEquals(3, $v1->z);
	}

	/**
	 *
	 */
	public function testLen() {
		$v1 = new Vector3d(1, 2, 3);
		$v2 = new Vector3d(3, 2, 1);

		$this->assertEquals(3.741657386773941, $v1->len());
		$this->assertEquals($v1->len(), $v2->len());
	}

	/**
	 * @throws \Exception
	 */
	public function testNormalize() {
		$v1 = new Vector3d(1, 2, 3);
		$v2 = $v1->normalize();

		$this->assertEquals($v2->len(), 1);
		$this->assertEquals($v2->x, 0.267261241912424);
		$this->assertEquals($v2->y, 0.534522483824849);
		$this->assertEquals($v2->z, 0.8017837257372730);
	}

	/**
	 * @expectedException        \Exception
	 * @expectedExceptionMessage len = 0
	 */
	public function testNormalizeException() {
		$v1 = new Vector3d(0, 0, 0);
		$v1->normalize();
	}

	/**
	 *
	 */
	public function testEquality() {
		$v1 = new Vector3d(1, 2, 3);
		$v2 = new Vector3d(1, 2, 3);

		$this->assertEquals($v1, $v2);

		$v3 = new Vector3d(2, 2, 3);

		$this->assertNotEquals($v1, $v3);

		$v4 = new Vector3d(2, 3, 4);

		$this->assertTrue($v1->isLowerThan($v4));
		$this->assertTrue($v4->isGreaterThan($v1));
		$this->assertFalse($v1->isLowerThan($v3));
	}

	/**
	 *
	 */
	public function testMultiplication() {
		$v1 = new Vector3d(1, 2, 3);
		$v2 = new Vector3d(2, 4, 6);

		$this->assertEquals(Vector3d::multiply($v1, 2), $v2);

		$this->assertEquals(Vector3d::multiplyV($v1, $v1), 14);
		$this->assertEquals(Vector3d::multiplyV($v1, $v2), 28);

		$v3 = Vector3d::crossProductV($v1, $v2);

		$this->assertEquals($v3->x, 0);
		$this->assertEquals($v3->y, 0);
		$this->assertEquals($v3->z, 0);

		$v4 = Vector3d::crossProductV($v1, new Vector3d(3, 2, 1));

		$this->assertEquals($v4->x, -4);
		$this->assertEquals($v4->y, 8);
		$this->assertEquals($v4->z, -4);

		$v5 = Vector3d::crossProduct($v1, 3, 2, 1);

		$this->assertEquals($v5->x, -4);
		$this->assertEquals($v5->y, 8);
		$this->assertEquals($v5->z, -4);
	}

	/**
	 *
	 */
	public function testAddition() {
		$v1 = new Vector3d(1, 2, 3);

		$this->assertEquals(new Vector3d(4, 11, 11), Vector3d::add($v1, 3, 9, 8));

		$v2 = new Vector3d(0, 9, 8);

		$this->assertEquals(new Vector3d(1, 11, 11), Vector3d::addV($v1, $v2));
	}

	/**
	 *
	 */
	public function testSubtraction() {
		$v1 = new Vector3d(1, 2, 3);

		$this->assertEquals(new Vector3d(-2, -7, -5), Vector3d::sub($v1, 3, 9, 8));

		$v2 = new Vector3d(0, 9, 8);

		$this->assertEquals(new Vector3d(1, -7, -5), Vector3d::subV($v1, $v2));
	}

	/**
	 *
	 */
	public function testInverse() {
		$v1 = new Vector3d(1, 2, 3);

		$this->assertEquals(new Vector3d(-1, -2, -3), $v1->inverse());
	}
}
