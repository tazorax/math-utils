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
		$p2 = new Point2d(0, 5);
		$p3 = new Point2d(5, 0);
var_dump(1.5707963267949, deg2rad(90));
		$this->assertEquals(deg2rad(90), Utils::getAngle($p1, $p2, $p3));
		$this->assertEquals(deg2rad(90), Utils::getAngle($p1, $p3, $p2));
	}

	/**
	 * @expectedException        Exception
	 * @expectedExceptionMessage Points must be different than the center point!
	 */
	public function testGetAngleException() {
		$p1 = new Point2d(0, 0);
		$p2 = new Point2d(0, 0);
		$p3 = new Point2d(0, 3);

		Utils::getAngle($p1, $p2, $p3);
	}
}
