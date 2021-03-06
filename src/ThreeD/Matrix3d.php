<?php

/*
 * This file is part of the MathUtils package.
 *
 * (c) tazorax <tazorax@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tazorax\MathUtils\ThreeD;

/**
 * Class Matrix3d
 * @package Tazorax\MathUtils\ThreeD
 */
class Matrix3d
{
    /**
     * @var float
     */
    public $m11;
    /**
     * @var float
     */
    public $m12;
    /**
     * @var float
     */
    public $m13;
    /**
     * @var float
     */
    public $m14;
    /**
     * @var float
     */
    public $m21;
    /**
     * @var float
     */
    public $m22;
    /**
     * @var float
     */
    public $m23;
    /**
     * @var float
     */
    public $m24;
    /**
     * @var float
     */
    public $m31;
    /**
     * @var float
     */
    public $m32;
    /**
     * @var float
     */
    public $m33;
    /**
     * @var float
     */
    public $m34;
    /**
     * @var float
     */
    public $offset_x;
    /**
     * @var float
     */
    public $offset_y;
    /**
     * @var float
     */
    public $offset_z;
    /**
     * @var float
     */
    public $m44;

    /**
     * Matrix3d constructor.
     * @param float $m11
     * @param float $m12
     * @param float $m13
     * @param float $m14
     * @param float $m21
     * @param float $m22
     * @param float $m23
     * @param float $m24
     * @param float $m31
     * @param float $m32
     * @param float $m33
     * @param float $m34
     * @param float $offset_x
     * @param float $offset_y
     * @param float $offset_z
     * @param float $m44
     */
    public function __construct($m11, $m12, $m13, $m14, $m21, $m22, $m23, $m24, $m31, $m32, $m33, $m34, $offset_x, $offset_y, $offset_z, $m44)
    {
        $this->m11 = $m11;
        $this->m12 = $m12;
        $this->m13 = $m13;
        $this->m14 = $m14;
        $this->m21 = $m21;
        $this->m22 = $m22;
        $this->m23 = $m23;
        $this->m24 = $m24;
        $this->m31 = $m31;
        $this->m32 = $m32;
        $this->m33 = $m33;
        $this->m34 = $m34;
        $this->offset_x = $offset_x;
        $this->offset_y = $offset_y;
        $this->offset_z = $offset_z;
        $this->m44 = $m44;
    }
}
