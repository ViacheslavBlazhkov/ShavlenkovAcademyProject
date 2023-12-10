<?php

namespace App\Http\Controllers;

use JsonException;

/**
 * Class NestingController
 * @package App\Http\Controllers
 */
class NestingController extends Controller
{
	/*** Handle the incoming request.
	 * @throws JsonException
	 */
    public function __invoke(int $nestingCount): void
    {
		$array = array();
        $json = json_encode($this->getRecursiveArray($array, $nestingCount + 1), JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
	    echo sprintf('<pre>%s</pre>', $json);
    }

	/**
	 * @param array $arr
	 * @param int   $nestCount
	 * @return array|array[]
	 */
	private function getRecursiveArray(array $arr, int $nestCount): array
    {
        $nestCount--;
		if($nestCount > 0) {
			$arr = ['level_' . $nestCount => $this->getRecursiveArray($arr, $nestCount)];
		}
	    return $arr;
    }
}
