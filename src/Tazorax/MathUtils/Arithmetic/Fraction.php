<?php

namespace Tazorax\MathUtils\Arithmetic;
use Tazorax\MathUtils\Exception;

/**
 * Class representing a fraction number
 *
 * @package Tazorax\MathUtils\Arithmetic
 */
class Fraction {
	/**
	 * Numerator
	 *
	 * @var int
	 */
	public $numerator;
	/**
	 * Denominator
	 *
	 * @var int
	 */
	public $denominator;

	/**
	 * Fraction constructor.
	 *
	 * @param int $numerator Numerator
	 * @param int $denominator Denominator
	 */
	public function __construct($numerator = 0, $denominator = 0) {
		$this->numerator = $numerator;
		$this->denominator = $denominator;
	}

	/**
	 * Simplify this fraction
	 *
	 * @return Fraction
	 */
	public function simplify() {
		$g = Utils::gcd($this->numerator, $this->denominator);

		return new self($this->numerator / $g, $this->denominator / $g);
	}

	/**
	 * Give a float representation of this fraction
	 *
	 * @return float
	 * @throws Exception
	 */
	public function floatValue() {
		if ($this->denominator === 0) {
			throw new Exception('Denominator is 0, can\'t divide by 0');
		}

		return $this->numerator / $this->denominator;
	}
}
