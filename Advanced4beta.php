<html>
	<head>
		<meta charset="utf-8">
		<title>Microtiming</title>
	</head>
	<body>
		<h1>
<?php
	set_time_limit(60);
	$time_start = microtime(true);
	$list = make_array(10000);
	$operations = 0;
	//var_dump($list);
	//how many times to carry out a complete traverse...
	for ($i = 0; $i < count($list)/2; $i++){
		$min = $list[$i];
		$max = $list[(count($list)-1)-$i];
		$counterMin = 0;
		$counterMax = 0;
		$hitMin = $i;
		$hitMax = count($list)-$i;
		//echo "Iteration: " . $i . "<br>";
		//traversing forward to find the min value...
		for ($j = $i; $j < count($list)-$i; $j++){

			if ($list[$j] < $min){
				$operations++;
				$min = $list[$j];
				$hitMin = $j;
				$counterMin++;
			}
			if ($list[$j] > $max){
				$operations++;
				$max = $list[$j];
				$hitMax = $j;
				$counterMax++;
			}
		}
		//make a swap to the front of the loop...
		//note that if the maximum value is in the position to be swapped, it will be lost!
		//updating the position of the max value before the min takes its spot!
		if ($counterMin > 0){
			// echo "<=====Min moving to the first position!!!<br>";
			$operations++;
			if ($hitMax == $i){
				// echo "Max found at the beginning of the list, updating its index<br>";
				$operations++;
				$hitMax = $hitMin;
				$mover = $list[$i];
				$list[$i] = $list[$hitMin];
				$list[$hitMin] = $mover;
			}else{
				$operations++;
				$mover = $list[$i];
				$list[$i] = $list[$hitMin];
				$list[$hitMin] = $mover;
			}
		}

		//make any swap to the end of the loop...
		//no need to worry about the minimum being in the end of the loop.  It would have already
		//moved to the beginning!
		if ($counterMax > 0){
			$operations++;
			// echo "Max moving to the last position!!!=====><br>";
			$mover = $list[(count($list)-1)-$i];
			$list[(count($list)-1)-$i] = $list[$hitMax];
			$list[$hitMax] = $mover;
		}
		// var_dump($list);
		// echo "hitMin was position: " . $hitMin . "<br>";
		// echo "hitMax was position: " . $hitMax . "<br><br><br>";
	}

	//var_dump($list);
	//return $list;

	function make_array($size){
		$numlist = array();
		for ($x = 0; $x < $size; $x++){
			$numlist[] = rand(0,10);
		}
		return $numlist;
	}

	$time_end = microtime(true);
	$time = $time_end - $time_start;
	echo "Elapsed Time: " . $time . " Number of if/else operations: " . $operations;
?>
		</h1>
	</body>
</html>