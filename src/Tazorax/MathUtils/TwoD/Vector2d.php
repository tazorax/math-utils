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

/**
 * Represents an orthonormal vector
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Vector2d {
	/**
	 * @var float
	 */
	public $x = 0;
	/**
	 * @var float
	 */
	public $y = 0;

	/**
	 * Vector2d constructor.
	 * @param float $x
	 * @param float $y
	 */
	public function __construct($x = 0, $y = 0) {
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * @param Vector2d $vector1
	 * @param Vector2d $vector2
	 * @return bool
	 */
	public static function compareEquals(Vector2d $vector1, Vector2d $vector2) {
		return $vector1->x == $vector2->x && $vector1->y == $vector2->y;
	}
}
