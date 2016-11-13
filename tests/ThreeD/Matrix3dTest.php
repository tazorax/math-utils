<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\Tests\ThreeD;

use Tazorax\MathUtils\ThreeD\Matrix3d;

/**
 * Class Matrix3dTest
 * @package Tazorax\MathUtils\ThreeD
 */
class Matrix3dTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testNew() {
		$m = new Matrix3d(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);

		$this->assertEquals(1, $m->m11);
		$this->assertEquals(2, $m->m12);
		$this->assertEquals(3, $m->m13);
		$this->assertEquals(4, $m->m14);
		$this->assertEquals(5, $m->m21);
		$this->assertEquals(6, $m->m22);
		$this->assertEquals(7, $m->m23);
		$this->assertEquals(8, $m->m24);
		$this->assertEquals(9, $m->m31);
		$this->assertEquals(10, $m->m32);
		$this->assertEquals(11, $m->m33);
		$this->assertEquals(12, $m->m34);
		$this->assertEquals(13, $m->offset_x);
		$this->assertEquals(14, $m->offset_y);
		$this->assertEquals(15, $m->offset_z);
		$this->assertEquals(16, $m->m44);
	}
}
