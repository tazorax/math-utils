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
 * Represents a triangle (geometric form)
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Triangle extends Polygon
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
     * AB side
     */
    const AB_SIDE = 0;

    /**
     * AC side
     */
    const AC_SIDE = 1;

    /**
     * BC side
     */
    const BC_SIDE = 2;

    /**
     * Triangle constructor.
     *
     * @param Point2d $pointA A point
     * @param Point2d $pointB B point
     * @param Point2d $pointC C point
     */
    public function __construct(Point2d $pointA, Point2d $pointB, Point2d $pointC)
    {
        parent::__construct();

        $this->setPointA($pointA);
        $this->setPointB($pointB);
        $this->setPointC($pointC);
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
     * @return Triangle
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
     * @return Triangle
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
     * @return Triangle
     */
    public function setPointC($point)
    {
        $this->setPoint(self::C_POINT, $point);

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param int $index
     * @param Point2d $point
     * @return Triangle
     * @throws Exception
     */
    public function setPoint($index, Point2d $point)
    {
        if (!in_array($index, array(0, 1, 2))) {
            throw new Exception('I am a triangle!');
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
        throw new Exception('I am a triangle!');
    }

    /**
     * Get the highest side.
     * If sizes are same, AB or AC side will return first
     *
     * @return int
     */
    public function getHighSide()
    {
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
    public function isRight()
    {
        $angles = [
            Point2d::getAngle($this->getPointA(), $this->getPointB(), $this->getPointC()),
            Point2d::getAngle($this->getPointB(), $this->getPointA(), $this->getPointC()),
            Point2d::getAngle($this->getPointC(), $this->getPointA(), $this->getPointB())
        ];

        return in_array(deg2rad(90), $angles);
    }

    /**
     * Determines if this triangle is isosceles
     *
     * @return bool
     */
    public function isIsosceles()
    {
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
    public function isEquilateral()
    {
        $sizes = $this->getRoundedSideSizes();

        return $sizes[self::AB_SIDE] == $sizes[self::AC_SIDE] && $sizes[self::AB_SIDE] == $sizes[self::BC_SIDE];
    }

    /**
     * Get size of all sides
     *
     * @return array
     */
    public function getSideSizes()
    {
        $ab = $this->getPointA()->distanceFrom($this->getPointB());
        $ac = $this->getPointA()->distanceFrom($this->getPointC());
        $bc = $this->getPointB()->distanceFrom($this->getPointC());

        return [self::AB_SIDE => $ab, self::AC_SIDE => $ac, self::BC_SIDE => $bc];
    }

    /**
     * Get rounded size of all sides
     *
     * @return array
     */
    public function getRoundedSideSizes()
    {
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
    public function getArea()
    {
        $sizes = $this->getSideSizes();

        $p = array_sum($sizes) / 2;

        return sqrt($p * ($p - $sizes[self::AB_SIDE]) * ($p - $sizes[self::AC_SIDE]) * ($p - $sizes[self::BC_SIDE]));
    }
}
