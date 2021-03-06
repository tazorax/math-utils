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
class Rectangle extends Polygon
{
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
     * @throws Exception
     */
    public function __construct(Point2d $pointA, Point2d $pointB, Point2d $pointC, Point2d $pointD)
    {
        parent::__construct();

        $test1 = Point2d::getAngle($pointA, $pointD, $pointB);
        $test2 = Point2d::getAngle($pointB, $pointA, $pointC);
        $test3 = Point2d::getAngle($pointC, $pointB, $pointD);
        $test4 = Point2d::getAngle($pointD, $pointC, $pointA);

        if ($test1 != deg2rad(90) || $test2 != deg2rad(90) || $test3 != deg2rad(90) || $test4 != deg2rad(90)) {
            throw new Exception('Points must be draw a rectangle!');
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
    public function getPointA()
    {
        return $this->getPoint(self::A_POINT);
    }

    /**
     * Set A point
     *
     * @param Point2d $point
     * @return Rectangle
     */
    public function setPointA($point)
    {
        $this->setPoint(self::A_POINT, $point);

        return $this;
    }

    /**
     * Get B point
     *
     * @return Point2d
     */
    public function getPointB()
    {
        return $this->getPoint(self::B_POINT);
    }

    /**
     * Set B point
     *
     * @param Point2d $point
     * @return Rectangle
     */
    public function setPointB($point)
    {
        $this->setPoint(self::B_POINT, $point);

        return $this;
    }

    /**
     * Get C point
     *
     * @return Point2d
     */
    public function getPointC()
    {
        return $this->getPoint(self::C_POINT);
    }

    /**
     * Set C point
     *
     * @param Point2d $point
     * @return Rectangle
     */
    public function setPointC($point)
    {
        $this->setPoint(self::C_POINT, $point);

        return $this;
    }

    /**
     * Get D point
     *
     * @return Point2d
     */
    public function getPointD()
    {
        return $this->getPoint(self::D_POINT);
    }

    /**
     * Set D point
     *
     * @param Point2d $point
     * @return Rectangle
     */
    public function setPointD($point)
    {
        $this->setPoint(self::D_POINT, $point);

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param int $index
     * @param Point2d $point
     * @return Rectangle
     * @throws Exception
     */
    public function setPoint($index, Point2d $point)
    {
        if (!in_array($index, array(0, 1, 2, 3))) {
            throw new Exception('I am a rectangle!');
        }

        parent::setPoint($index, $point);

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param Point2d $point
     * @throws Exception
     */
    public function addPoint(Point2d $point)
    {
        throw new Exception('I am a rectangle!');
    }
}
