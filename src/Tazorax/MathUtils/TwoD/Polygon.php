<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Represents a polygon (geometric form)
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Polygon {
	/**
	 * Precision of size comparison
	 */
	const COMPARAISON_PRECISION = 12;

	/**
	 * @var Point2d[]
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

	/**
	 * Get perimeter
	 *
	 * @return float
	 * @throws \Exception
	 */
	public function getPerimeter() {
		$this->checkPoints();

		$buffer = 0;

		$last_point = null;

		foreach ($this->_points as $point) {
			if (null !== $last_point) {
				$buffer += $point->distanceFrom($last_point);
			}
			$last_point = $point;
		}

		$buffer += $last_point->distanceFrom(reset($this->_points));

		return $buffer;
	}

	/**
	 * Checks if it is a polygon (with 3 points min.)
	 *
	 * @throws \Exception
	 */
	private function checkPoints() {
		if ($this->pointsCount() < 3) {
			throw new \Exception('It is not a polygon, missing points !');
		}
	}

	/**
	 * Apply a vector on each point and return a new instance of Polygon
	 *
	 * @param Vector2d $vector
	 * @return Polygon
	 */
	public function translate(Vector2d $vector) {
		$buffer = clone $this;

		foreach ($buffer->_points as $index => $point) {
			$buffer->setPoint($index, Point2d::add($point, $vector));
		}

		return $buffer;
	}
}
