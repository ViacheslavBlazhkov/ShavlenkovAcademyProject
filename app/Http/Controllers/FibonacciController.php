<?php

namespace App\Http\Controllers;

/**
 * Class FibonacciController
 * @package App\Http\Controllers
 */
class FibonacciController extends Controller
{
	/*** Handle the incoming request. */
	public function __invoke(int $index): void
	{
		echo $this->getFibonacciNumber($index - 1);
	}

	/**
	 * @param int $number
	 * @return int|NULL
	 */
	public function getFibonacciNumber(int $number): ?int
	{
		if ($number === 0) {
			return 0;
		}
		if ($number === 1) {
			return 1;
		}
		return $this->getFibonacciNumber($number - 1) + $this->getFibonacciNumber($number - 2);
	}

}
