<?php

class comparisonArrayClass
{
	// public static function test()
	// {
	// 	echo 1;
	// }

	public static function comparisonArray($array1, $array2, $titleName)
	{
        $array1 = self::convertMultiToSingleArray($array1);
        $array2 = self::convertMultiToSingleArray($array2);

		$arrayTemp = [];
		if (count($array1) > count($array2)) {
			$arrayTemp = $array1;
			$array1 = $array2;
			$array2 = $arrayTemp;
		}

		$array1 = self::fillMissingData2Array($array1, $array2, $titleName);
		$array2 = self::fillMissingData2Array($array2, $array1, $titleName);
		
		$combineArr = self::combineArray($array1, $array2, $titleName);

		self::displayResultTable($combineArr);
	}

	public static function convertMultiToSingleArray($array, $key = '')
	{
		$resultArr = [];
		foreach( array_keys($array) as $currentKey ){
			$v = $array[$currentKey];
			if (is_scalar($v)) {
				$resultArr[$currentKey . $key] = $v;

			} elseif (is_array($v)) {
				$resultArr = array_merge( $resultArr,
					self::convertMultiToSingleArray($v, $currentKey . $key)
				);
			}
		}
		return $resultArr;
	}
	
	public static function fillMissingData2Array($array, $arrayTarget, $titleName) 
	{
		$index = -1;
		foreach ($arrayTarget as $key => $row) {
			$index++;
			if ($row == '') continue;

			if (!isset($array[$key])) {
				$arrayAdd = [$key => ''];
				if (is_int(strpos($key, $titleName))) {
					$arrayAdd = [$key => $row];
				}
				$array = 
					array_slice($array, 0, $index, true) 
					+ $arrayAdd 
					+ array_slice($array, $index, count($array) - $index, true);
			}
		}

		return $array;
	}

	public static function combineArray($array1, $array2, $titleName)
	{
		$resultArr = [];
		foreach ($array1 as $key => $row) {
			if (is_int(strpos($key, $titleName))) {
				$resultArr[] = [
					'title' => $row
				];

			} else {
				$resultArr[] = [$row, $array2[$key]];
			}
		}

		return $resultArr;
	}

	public static function displayResultTable($array)
	{
		$html = "";
		$html .= "<table>";
		$html .= "<tbody>";
		foreach ($array as $key => $row) {
			if (isset($row['title'])) {
				$html .= "<tr>";
				$html .= "<td colspan=2 style='border: 1px solid black;'>";
				$html .= $row['title'];
				$html .= "</td>";
				$html .= "</tr>";

			} else {
				$html .= "<tr>";
				$html .= "<td style='border: 1px solid black;'>";
				$html .= $row[0];
				$html .= "</td>";
				$html .= "<td style='border: 1px solid black;'>";
				$html .= $row[1];
				$html .= "</td>";
				$html .= "</tr>";
			}
		}
		$html .= "</tbody>";
		$html .= "</table>";

		echo $html;
		die;
	}
}