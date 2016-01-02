<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\Tests;

use Tazorax\MathUtils\Exception;
use Tazorax\MathUtils\TwoD\Point2d;
use Tazorax\MathUtils\TwoD\Utils;

/**
 * Class UtilsTest
 * @package Tazorax\MathUtils\Tests
 */
class UtilsTest extends \PHPUnit_Framework_TestCase {

	/**
	 *
	 */
	public function testGetAngle() {
		$p1 = new Point2d(0, 0);
		$p2 = new Point2d(0, 3);
		$p3 = new Point2d(4, 0);

		$this->assertEquals(deg2rad(90), Utils::getAngle($p1, $p2, $p3));
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage B and C points must be different than A point !
	 */
	public function testGetAngleException() {
		$p1 = new Point2d(0, 0);
		$p2 = new Point2d(0, 3);
		$p3 = new Point2d(0, 0);

		Utils::getAngle($p1, $p2, $p3);
	}
}
