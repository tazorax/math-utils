<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class representing a triangle (geometric form)
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Triangle {

	/**
	 * Precision of size comparison
	 */
	const COMPARAISON_PRECISION = 12;

	/**
	 * AB Side
	 */
	const AB_SIDE = 1;

	/**
	 * AC Side
	 */
	const AC_SIDE = 2;

	/**
	 * BC Side
	 */
	const BC_SIDE = 3;

	/**
	 * A point
	 *
	 * @var Point2d
	 */
	private $_pointA;

	/**
	 * B point
	 *
	 * @var Point2d
	 */
	private $_pointB;

	/**
	 * C point
	 *
	 * @var Point2d
	 */
	private $_pointC;

	/**
	 * Triangle constructor.
	 *
	 * @param Point2d $pointA A point
	 * @param Point2d $pointB B point
	 * @param Point2d $pointC C point
	 */
	public function __construct(Point2d $pointA, Point2d $pointB, Point2d $pointC) {
		$this->_pointA = $pointA;
		$this->_pointB = $pointB;
		$this->_pointC = $pointC;
	}

	/**
	 * Get A point
	 *
	 * @return Point2d
	 */
	public function getPointA() {
		return $this->_pointA;
	}

	/**
	 * Set A point
	 *
	 * @param Point2d $pointA
	 */
	public function setPointA($pointA) {
		$this->_pointA = $pointA;
	}

	/**
	 * Get B point
	 *
	 * @return Point2d
	 */
	public function getPointB() {
		return $this->_pointB;
	}

	/**
	 * Set B point
	 *
	 * @param Point2d $pointB
	 */
	public function setPointB($pointB) {
		$this->_pointB = $pointB;
	}

	/**
	 * Get C point
	 *
	 * @return Point2d
	 */
	public function getPointC() {
		return $this->_pointC;
	}

	/**
	 * Set C point
	 *
	 * @param Point2d $pointC
	 */
	public function setPointC($pointC) {
		$this->_pointC = $pointC;
	}

	/**
	 * Get the highest side.
	 * If sizes are same, AB ou AC side will return first
	 *
	 * @return int
	 */
	public function getHighSide() {
		$sizes = $this->getSideSizes();

		if ($sizes[self::AB_SIDE] >= $sizes[self::AC_SIDE] && $sizes[self::AB_SIDE] >= $sizes[self::BC_SIDE]) {
			$buffer = self::AB_SIDE;
		} elseif ($sizes[self::AC_SIDE] >= $sizes[self::AB_SIDE] && $sizes[self::AC_SIDE] >= $sizes[self::BC_SIDE]) {
			$buffer = self::AC_SIDE;
		} else {
			$buffer = self::BC_SIDE;
		}

		return $buffer;
	}

	/**
	 * Determines if this triangle is right
	 *
	 * @return bool
	 */
	public function isRight() {
		$sizes = $this->getSideSizes();
		$high_side = $this->getHighSide();

		$high_side_size = $sizes[$high_side];

		unset($sizes[$high_side]);

		$other_sizes = array_values($sizes);

		return pow($high_side_size, 2) == pow($other_sizes[0], 2) + pow($other_sizes[1], 2);
	}

	/**
	 * Determines if this triangle is isosceles
	 *
	 * @return bool
	 */
	public function isIsosceles() {
		$sizes = $this->getRoundedSideSizes();

		return
			$sizes[self::AB_SIDE] == $sizes[self::AC_SIDE] ||
			$sizes[self::AB_SIDE] == $sizes[self::BC_SIDE] ||
			$sizes[self::BC_SIDE] == $sizes[self::AC_SIDE];
	}

	/**
	 * Determines if this triangle is equilateral
	 *
	 * @return bool
	 */
	public function isEquilateral() {
		$sizes = $this->getRoundedSideSizes();

		return $sizes[self::AB_SIDE] == $sizes[self::AC_SIDE] && $sizes[self::AB_SIDE] == $sizes[self::BC_SIDE];
	}

	/**
	 * Get size of all sides
	 *
	 * @return array
	 */
	public function getSideSizes() {
		$ab = $this->_pointA->distanceFrom($this->_pointB);
		$ac = $this->_pointA->distanceFrom($this->_pointC);
		$bc = $this->_pointB->distanceFrom($this->_pointC);

		return [self::AB_SIDE => $ab, self::AC_SIDE => $ac, self::BC_SIDE => $bc];
	}

	/**
	 * Get rounded size of all sides
	 *
	 * @return array
	 */
	public function getRoundedSideSizes() {
		$sizes = $this->getSideSizes();

		array_walk($sizes, function (&$value) {
			$value = round($value, self::COMPARAISON_PRECISION);
		});

		return $sizes;
	}
}
