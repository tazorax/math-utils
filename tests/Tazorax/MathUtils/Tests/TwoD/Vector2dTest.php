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
use Tazorax\MathUtils\TwoD\Vector2d;

/**
 * Class Vector2dTest
 * @package Tazorax\MathUtils\TwoD
 */
class Vector2dTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testNew() {
		$v1 = new Vector2d(1, 2);
		$this->assertEquals(1, $v1->x);
		$this->assertEquals(2, $v1->y);
	}

	/**
	 *
	 */
	public function testLength() {
		$v1 = new Vector2d(1, 2);
		$v2 = new Vector2d(2, 1);

		$this->assertEquals(2.2360679774998, $v1->length());
		$this->assertEquals($v1->length(), $v2->length());
	}

	/**
	 *
	 */
	public function testNormalize() {
		$v1 = new Vector2d(1, 2);
		$v1->normalize();

		$this->assertEquals(1, $v1->length());
		$this->assertEquals(0.44721359549996, $v1->x);
		$this->assertEquals(0.89442719099992, $v1->y);
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage len = 0
	 */
	public function testNormalizeException() {
		$v1 = new Vector2d(0, 0);
		$v1->normalize();
	}

	/**
	 *
	 */
	public function testDot() {
		$v1 = new Vector2d(1, 1);
		$v2 = new Vector2d(1, 1);

		$this->assertEquals(2, $v1->dot($v2));

		$v3 = new Vector2d(-1, 1);

		$this->assertEquals(0, $v1->dot($v3));

		$v4 = new Vector2d(-1, -1);

		$this->assertEquals(-2, $v1->dot($v4));
	}

	/**
	 *
	 */
	public function testAddition() {
		$v1 = new Vector2d(1, 2);

		$this->assertEquals($v1->add(new Vector2d(3, 9)), new Vector2d(4, 11));

		$v2 = new Vector2d(0, 9);

		$this->assertEquals($v2->add(new Vector2d(3, 9)), new Vector2d(3, 18));
	}

	/**
	 *
	 */
	public function testSubtraction() {
		$v1 = new Vector2d(1, 2);

		$this->assertEquals($v1->sub(new Vector2d(3, 9)), new Vector2d(-2, -7));

		$v2 = new Vector2d(0, 9);

		$this->assertEquals($v2->sub(new Vector2d(3, 9)), new Vector2d(-3, 0));
	}

}
