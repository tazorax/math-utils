<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class representing a triangle (geometric form)
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Triangle extends Polygon {

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
	 * Triangle constructor.
	 *
	 * @param Point2d $pointA A point
	 * @param Point2d $pointB B point
	 * @param Point2d $pointC C point
	 */
	public function __construct(Point2d $pointA, Point2d $pointB, Point2d $pointC) {
		parent::__construct();
		$this->_points[0] = $pointA;
		$this->_points[1] = $pointB;
		$this->_points[2] = $pointC;
	}

	/**
	 * Get A point
	 *
	 * @return Point2d
	 */
	public function getPointA() {
		return $this->_points[0];
	}

	/**
	 * Set A point
	 *
	 * @param Point2d $pointA
	 */
	public function setPointA($pointA) {
		$this->_points[0] = $pointA;
	}

	/**
	 * Get B point
	 *
	 * @return Point2d
	 */
	public function getPointB() {
		return $this->_points[1];
	}

	/**
	 * Set B point
	 *
	 * @param Point2d $pointB
	 */
	public function setPointB($pointB) {
		$this->_points[1] = $pointB;
	}

	/**
	 * Get C point
	 *
	 * @return Point2d
	 */
	public function getPointC() {
		return $this->_points[2];
	}

	/**
	 * Set C point
	 *
	 * @param Point2d $pointC
	 */
	public function setPointC($pointC) {
		$this->_points[2] = $pointC;
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
		$ab = $this->_points[0]->distanceFrom($this->_points[1]);
		$ac = $this->_points[0]->distanceFrom($this->_points[2]);
		$bc = $this->_points[1]->distanceFrom($this->_points[2]);

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

	/**
	 * Get triangle area
	 *
	 * @return float
	 */
	public function getArea() {
		$sizes = $this->getSideSizes();

		$p = array_sum($sizes) / 2;

		return sqrt($p * ($p - $sizes[self::AB_SIDE]) * ($p - $sizes[self::AC_SIDE]) * ($p - $sizes[self::BC_SIDE]));
	}
}
