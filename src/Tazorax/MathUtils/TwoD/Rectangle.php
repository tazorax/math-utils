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
 * Represents a rectangle (geometric form)
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Rectangle extends Polygon {
	/**
	 * A point
	 */
	const A_POINT = 0;

	/**
	 * B point
	 */
	const B_POINT = 1;

	/**
	 * C point
	 */
	const C_POINT = 2;

	/**
	 * D point
	 */
	const D_POINT = 3;

	/**
	 * Rectangle constructor.
	 *
	 * @param Point2d $pointA A point
	 * @param Point2d $pointB B point
	 * @param Point2d $pointC C point
	 * @param Point2d $pointD D point
	 */
	public function __construct(Point2d $pointA, Point2d $pointB, Point2d $pointC, Point2d $pointD) {
		parent::__construct();

		$test1 = new Triangle($pointA, $pointB, $pointC);
		$test2 = new Triangle($pointB, $pointC, $pointD);
		$test3 = new Triangle($pointC, $pointD, $pointA);
		$test4 = new Triangle($pointD, $pointA, $pointB);

		if (!$test1->isRight() || !$test2->isRight() || !$test3->isRight() || !$test4->isRight()) {
			throw new Exception('Points must be draw a rectangle !');
		}

		$this->setPointA($pointA);
		$this->setPointB($pointB);
		$this->setPointC($pointC);
		$this->setPointD($pointD);
	}

	/**
	 * Get A point
	 *
	 * @return Point2d
	 */
	public function getPointA() {
		return $this->getPoint(self::A_POINT);
	}

	/**
	 * Set A point
	 *
	 * @param Point2d $point
	 */
	public function setPointA($point) {
		$this->setPoint(self::A_POINT, $point);
	}

	/**
	 * Get B point
	 *
	 * @return Point2d
	 */
	public function getPointB() {
		return $this->getPoint(self::B_POINT);
	}

	/**
	 * Set B point
	 *
	 * @param Point2d $point
	 */
	public function setPointB($point) {
		$this->setPoint(self::B_POINT, $point);
	}

	/**
	 * Get C point
	 *
	 * @return Point2d
	 */
	public function getPointC() {
		return $this->getPoint(self::C_POINT);
	}

	/**
	 * Set C point
	 *
	 * @param Point2d $point
	 */
	public function setPointC($point) {
		$this->setPoint(self::C_POINT, $point);
	}

	/**
	 * Get D point
	 *
	 * @return Point2d
	 */
	public function getPointD() {
		return $this->getPoint(self::D_POINT);
	}

	/**
	 * Set D point
	 *
	 * @param Point2d $point
	 */
	public function setPointD($point) {
		$this->setPoint(self::D_POINT, $point);
	}

	/**
	 * @inheritdoc
	 *
	 * @param int $index
	 * @param Point2d $point
	 * @throws Exception
	 */
	public function setPoint($index, Point2d $point) {
		if (!in_array($index, array(0, 1, 2, 3))) {
			throw new Exception('I am a rectangle !');
		}

		parent::setPoint($index, $point);
	}

	/**
	 * @inheritdoc
	 *
	 * @param Point2d $point
	 * @throws Exception
	 */
	public function addPoint(Point2d $point) {
		throw new Exception('I am a rectangle !');
	}
}
