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
 * Represents an orthonormal point
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Point2d
{
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
    public function __construct($x = .0, $y = .0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param Point2d $point
     * @param Vector2d $vector
     * @return Point2d
     */
    public static function subtract(Point2d $point, Vector2d $vector)
    {
        return new Point2d($point->x - $vector->x, $point->y - $vector->y);
    }

    /**
     * @param Point2d $point1
     * @param Point2d $point2
     * @return Vector2d
     */
    public static function subtractP(Point2d $point1, Point2d $point2)
    {
        return new Vector2d($point1->x - $point2->x, $point1->y - $point2->y);
    }

    /**
     * @param float $x
     * @param float $y
     * @return Point2d
     */
    public function offset($x, $y)
    {
        $tmp = self::add($this, new Vector2d($x, $y));
        $this->x = $tmp->x;
        $this->y = $tmp->y;

        return $this;
    }

    /**
     * @param Point2d $point
     * @param Vector2d $vector
     * @return Point2d
     */
    public static function add(Point2d $point, Vector2d $vector)
    {
        return new Point2d($point->x + $vector->x, $point->y + $vector->y);
    }

    /**
     * @param Point2d $point
     * @return float
     */
    public function distanceFrom(Point2d $point)
    {
        return self::distance($this, $point);
    }

    /**
     * @param Point2d $point1
     * @param Point2d $point2
     * @return float
     */
    public static function distance(Point2d $point1, Point2d $point2)
    {
        return sqrt(pow($point2->x - $point1->x, 2) + pow($point2->y - $point1->y, 2));
    }

    /**
     * Get angle (radians) on center
     *
     * @param Point2d $center
     * @param Point2d $point1
     * @param Point2d $point2
     * @return float
     * @throws Exception
     */
    public static function getAngle(Point2d $center, Point2d $point1, Point2d $point2)
    {
        if ($point1 == $center || $point2 == $center) {
            throw new Exception('Points must be different than the center point!');
        }

        $a = pow($center->x - $point2->x, 2) + pow($center->y - $point2->y, 2);
        $b = pow($center->x - $point1->x, 2) + pow($center->y - $point1->y, 2);
        $c = pow($point2->x - $point1->x, 2) + pow($point2->y - $point1->y, 2);

        return acos(($a + $b - $c) / sqrt(4 * $a * $b));
    }
}
