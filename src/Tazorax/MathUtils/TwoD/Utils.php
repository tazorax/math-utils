<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\TwoD;

use Tazorax\MathUtils\Exception;

/**
 * Class Utils
 * @package Tazorax\MathUtils\TwoD
 */
class Utils {
	/**
	 * Get angle (radians) on $pointA
	 *
	 * @param Point2d $pointA
	 * @param Point2d $pointB
	 * @param Point2d $pointC
	 * @return float
	 * @throws Exception
	 */
	public static function getAngle(Point2d $pointA, Point2d $pointB, Point2d $pointC) {
		$a = Point2d::distance($pointB, $pointC);
		$b = Point2d::distance($pointA, $pointC);
		$c = Point2d::distance($pointA, $pointB);

		if ($b == 0 || $c == 0) {
			throw new Exception('B and C points must be different than A point !');
		}

		$buffer = ((pow($b, 2) + pow($c, 2) - pow($a, 2)) / 2 * $b * $c);

		$buffer = acos($buffer);

		return $buffer;
	}
}