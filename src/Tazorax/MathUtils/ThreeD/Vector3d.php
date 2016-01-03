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

use Tazorax\MathUtils\Exception;

/**
 * Class Vector3d
 * @package Tazorax\MathUtils\ThreeD
 */
class Vector3d {
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
	 * Vector3d constructor.
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
	 * @return Vector3d
	 */
	public function inverse() {
		return new self(-$this->x, -$this->y, -$this->z);
	}

	/**
	 * Computes the dot product of the this vector and vector $vector.
	 *
	 * @param Vector3d $vector the other vector
	 * @return float
	 */
	public function dot(Vector3d $vector) {
		return ($this->x * $vector->x + $this->y * $vector->y + $this->z * $vector->z);
	}

	/**
	 * Returns the squared length of this vector.
	 *
	 * @return float the squared length of this vector
	 */
	public function lengthSquared() {
		return ($this->x * $this->x +
			$this->y * $this->y +
			$this->z * $this->z);
	}

	/**
	 * Returns the length of this vector.
	 *
	 * @return float the length of this vector
	 */
	public function length() {
		return (sqrt($this->lengthSquared()));
	}

	/**
	 * Normalizes this vector in place.
	 *
	 * @throws Exception
	 */
	public function normalize() {
		$tmp = $this->length();
		if (abs($tmp) > 1e-7) {
			$this->x = $this->x / $tmp;
			$this->y = $this->y / $tmp;
			$this->z = $this->z / $tmp;
		} else {
			throw new Exception('len = 0');
		}
	}

	/**
	 * @param Vector3d $vector
	 * @return bool
	 */
	public function isLowerThan(Vector3d $vector) {
		return ($this->x < $vector->x && $this->y < $vector->y && $this->z < $vector->z);
	}

	/**
	 * @param Vector3d $vector
	 * @return bool
	 */
	public function isGreaterThan(Vector3d $vector) {
		return ($this->x > $vector->x && $this->y > $vector->y && $this->z > $vector->z);
	}

	/**
	 * @param Vector3d $vector
	 * @param float $scalar
	 * @return Vector3d
	 */
	public static function multiply(Vector3d $vector, $scalar) {
		return new Vector3d($vector->x * $scalar, $vector->y * $scalar, $vector->z * $scalar);
	}

	/**
	 * @param Vector3d $vector1
	 * @param Vector3d $vector2
	 * @return float
	 */
	public static function multiplyV(Vector3d $vector1, Vector3d $vector2) {
		return $vector1->x * $vector2->x + $vector1->y * $vector2->y + $vector1->z * $vector2->z;
	}

	/**
	 * @param Vector3d $vector
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 * @return Vector3d
	 */
	public static function crossProduct(Vector3d $vector, $x, $y, $z) {
		$cx = $vector->y * $z - $vector->z * $y;
		$cy = $vector->z * $x - $vector->x * $z;
		$cz = $vector->x * $y - $vector->y * $x;

		return new Vector3d($cx, $cy, $cz);
	}

	/**
	 * @param Vector3d $vector1
	 * @param Vector3d $vector2
	 * @return Vector3d
	 */
	public static function crossProductV(Vector3d $vector1, Vector3d $vector2) {
		$cx = $vector1->y * $vector2->z - $vector1->z * $vector2->y;
		$cy = $vector1->z * $vector2->x - $vector1->x * $vector2->z;
		$cz = $vector1->x * $vector2->y - $vector1->y * $vector2->x;

		return new Vector3d($cx, $cy, $cz);
	}

	/**
	 * @param Vector3d $vector
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 * @return Vector3d
	 */
	public static function add(Vector3d $vector, $x, $y, $z) {
		return new self($vector->x + $x, $vector->y + $y, $vector->z + $z);
	}

	/**
	 * @param Vector3d $vector1
	 * @param Vector3d $vector2
	 * @return Vector3d
	 */
	public static function addV(Vector3d $vector1, Vector3d $vector2) {
		return new Vector3d($vector1->x + $vector2->x, $vector1->y + $vector2->y, $vector1->z + $vector2->z);
	}

	/**
	 * @param Vector3d $vector
	 * @param float $x
	 * @param float $y
	 * @param float $z
	 * @return Vector3d
	 */
	public static function sub(Vector3d $vector, $x, $y, $z) {
		return new Vector3d($vector->x - $x, $vector->y - $y, $vector->z - $z);
	}

	/**
	 * @param Vector3d $vector1
	 * @param Vector3d $vector2
	 * @return Vector3d
	 */
	public static function subV(Vector3d $vector1, Vector3d $vector2) {
		return new Vector3d($vector1->x - $vector2->x, $vector1->y - $vector2->y, $vector1->z - $vector2->z);
	}

	/**
	 * @param Vector3d $vector1
	 * @param Vector3d $vector2
	 * @return bool
	 */
	public static function compareEquals(Vector3d $vector1, Vector3d $vector2) {
		return $vector1->x == $vector2->x && $vector1->y == $vector2->y && $vector1->z == $vector2->z;
	}
}
