<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class Polygon
 * @package Tazorax\MathUtils\TwoD
 */
class Polygon {
	/**
	 * Precision of size comparison
	 */
	const COMPARAISON_PRECISION = 12;

	/**
	 * @var Point2d []
	 */
	protected $_points;

	/**
	 * Polygon constructor.
	 */
	public function __construct() {
		$this->_points = [];
	}

	/**
	 * Add point
	 *
	 * @param Point2d $point
	 */
	public function addPoint(Point2d $point) {
		$this->_points[] = $point;
	}

	/**
	 * Get point at index
	 *
	 * @param int $index
	 * @return Point2d
	 * @throws \Exception
	 */
	public function getPoint($index) {
		if (!isset($this->_points[$index])) {
			throw new \Exception('This point doest not exist');
		}

		return $this->_points[$index];
	}

	/**
	 * Add or set a point for the given index
	 *
	 * @param int $index
	 * @param Point2d $point
	 */
	public function setPoint($index, Point2d $point) {
		$this->_points[$index] = $point;
	}

	/**
	 * Get the number of points in this polygon
	 *
	 * @return int
	 */
	public function pointsCount() {
		return count($this->_points);
	}
}
