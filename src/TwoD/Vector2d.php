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
 * Represents an orthonormal vector
 *
 * @package Tazorax\MathUtils\TwoD
 */
class Vector2d
{
    /**
     * @var float
     */
    public $x = 0;
    /**
     * @var float
     */
    public $y = 0;

    /**
     * Vector2d constructor.
     *
     * @param float $x
     * @param float $y
     */
    public function __construct($x = .0, $y = .0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Computes the dot product of the this vector and vector $vector.
     *
     * @param Vector2d $vector the other vector
     * @return float
     */
    public function dot(Vector2d $vector)
    {
        return ($this->x * $vector->x + $this->y * $vector->y);
    }

    /**
     * Returns the squared length of this vector.
     *
     * @return float the squared length of this vector
     */
    public function lengthSquared()
    {
        return ($this->x * $this->x +
            $this->y * $this->y);
    }

    /**
     * Returns the length of this vector.
     *
     * @return float the length of this vector
     */
    public function length()
    {
        return sqrt($this->lengthSquared());
    }

    /**
     * Normalizes this vector in place.
     *
     * @return Vector2d
     * @throws Exception
     */
    public function normalize()
    {
        $tmp = $this->length();
        if (abs($tmp) > 1e-7) {
            $this->x = $this->x / $tmp;
            $this->y = $this->y / $tmp;
        } else {
            throw new Exception('len = 0');
        }

        return $this;
    }

    /**
     * @param Vector2d $vector
     * @return Vector2d
     */
    public function sub(Vector2d $vector)
    {
        return new self($this->x - $vector->x, $this->y - $vector->y);
    }

    /**
     * @param Vector2d $vector
     * @return Vector2d
     */
    public function add(Vector2d $vector)
    {
        return new self($this->x + $vector->x, $this->y + $vector->y);
    }
}
