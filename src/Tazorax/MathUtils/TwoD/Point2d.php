<?php

namespace Tazorax\MathUtils\TwoD;

/**
 * Class Point2d
 * @package Tazorax\MathUtils\TwoD
 */
class Point2d {
	/**
	 * @var float
	 */
	public $x;

	/**
	 * @var float
	 */
	public $y;

	/**
	 * Point2d constructor.
	 * @param float $x
	 * @param float $y
	 */
	public function __construct($x = 0, $y = 0) {
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * @param Point2d $point
	 * @param Vector2d $vector
	 * @return Point2d
	 */
	public static function subtract(Point2d $point, Vector2d $vector) {
		return new Point2d($point->x - $vector->x, $point->y - $vector->y);
	}

	/**
	 * @param Point2d $point1
	 * @param Point2d $point2
	 * @return Vector2d
	 */
	public static function subtractP(Point2d $point1, Point2d $point2) {
		return new Vector2d($point1->x - $point2->x, $point1->y - $point2->y);
	}

	/**
	 * @param Point2d $point
	 * @return bool
	 */
	public function isEquals(Point2d $point) {
		return self::compareEquals($this, $point);
	}

	/**
	 * @param Point2d $point1
	 * @param Point2d $point2
	 * @return bool
	 */
	public static function compareEquals(Point2d $point1, Point2d $point2) {
		return $point1->x == $point2->x && $point1->y == $point2->y;
	}

	/**
	 * @param float $x
	 * @param float $y
	 * @return void
	 */
	public function offset($x, $y) {
		$tmp = self::add($this, new Vector2d($x, $y));
		$this->x = $tmp->x;
		$this->y = $tmp->y;
	}

	/**
	 * @param Point2d $point
	 * @param Vector2d $vector
	 * @return Point2d
	 */
	public static function add(Point2d $point, Vector2d $vector) {
		return new Point2d($point->x + $vector->x, $point->y + $vector->y);
	}

	/**
	 * @param Point2d $point
	 * @return float
	 */
	public function distanceFrom(Point2d $point) {
		return self::distance($this, $point);
	}

	/**
	 * @param Point2d $point1
	 * @param Point2d $point2
	 * @return float
	 */
	public static function distance(Point2d $point1, Point2d $point2) {
		return sqrt(pow($point2->x - $point1->x, 2) + pow($point2->y - $point1->y, 2));
	}
}
