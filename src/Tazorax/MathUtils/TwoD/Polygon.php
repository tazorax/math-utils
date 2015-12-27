<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class Polygon
 * @package Tazorax\MathUtils\TwoD
 */
class Polygon {
	/**
	 * @var Point2d[]
	 */
	private $_points;

	/**
	 * Polygon constructor.
	 */
	public function __construct() {
		$this->_points = [];
	}

	/**
	 * @param Point2d $point
	 */
	public function addPoint(Point2d $point) {
		$this->_points[] = $point;
	}

	/**
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
}
