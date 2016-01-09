<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\ThreeD;

/**
 * Class Point3d
 * @package Tazorax\MathUtils\ThreeD
 */
class Point3d {
	/**
	 * @var float
	 */
	public $x = 0;
	/**
	 * @var float
	 */
	public $y = 0;
	/**
	 * @var float
	 */
	public $z = 0;

	/**
	 * Point3d constructor.
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 */
	public function __construct($x = 0, $y = 0, $z = 0) {
		$this->x = $x;
		$this->y = $y;
		$this->z = $z;
	}

	/**
	 * @param Point3d $point
	 * @param Vector3d $vector
	 * @return Point3d
	 */
	public static function subtract(Point3d $point, Vector3d $vector) {
		return new Point3d($point->x - $vector->x, $point->y - $vector->y, $point->z - $vector->z);
	}

	/**
	 * @param Point3d $point1
	 * @param Point3d $point2
	 * @return Vector3d
	 */
	public static function subtractP(Point3d $point1, Point3d $point2) {
		return new Vector3d($point1->x - $point2->x, $point1->y - $point2->y, $point1->z - $point2->z);
	}

	/**
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 * @return void
	 */
	public function offset($x, $y, $z) {
		$tmp = self::add($this, new Vector3d($x, $y, $z));
		$this->x = $tmp->x;
		$this->y = $tmp->y;
		$this->z = $tmp->z;
	}

	/**
	 * @param Point3d $point
	 * @param Vector3d $vector
	 * @return Point3d
	 */
	public static function add(Point3d $point, Vector3d $vector) {
		return new Point3d($point->x + $vector->x, $point->y + $vector->y, $point->z + $vector->z);
	}
}
