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
	 * Get angle (radians) on center
	 *
	 * @param Point2d $center
	 * @param Point2d $point1
	 * @param Point2d $point2
	 * @return float
	 * @throws Exception
	 */
	public static function getAngle(Point2d $center, Point2d $point1, Point2d $point2) {
		if ($point1->isEquals($center) || $point1->isEquals($center)) {
			throw new Exception('Points must be different than the center point!');
		}

		$a = pow($center->x - $point2->x, 2) + pow($center->y - $point2->y, 2);
		$b = pow($center->x - $point1->x, 2) + pow($center->y - $point1->y, 2);
		$c = pow($point2->x - $point1->x, 2) + pow($point2->y - $point1->y, 2);

		return acos(($a + $b - $c) / sqrt(4 * $a * $b));
	}
}
