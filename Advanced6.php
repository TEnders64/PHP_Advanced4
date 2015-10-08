<?php
	set_time_limit(60);
	$time_start = microtime(true);

	$list = make_array(10000);
	$limit = count($list);

	for ($i = 0; $i < $limit; $i++){
		$index = 0;
		while ($index < ($limit-$i-1)){

			if ($list[$index] > $list[$index+1]){
				$temp = $list[$index];
				$list[$index] = $list[$index+1];
				$list[$index+1] = $temp;
			}

		$index++;
		//var_dump($list);
		}
		//echo "while loop terminated<br>";
	}
	//var_dump($list);

	function make_array($size){
		$nums = array();
		for ($x = 0; $x < $size; $x++){
			$nums[] = rand(0,10000);
		}
		return $nums;
	}
	$time_end = microtime(true);
	$time = $time_end - $time_start;
	echo "<h1>Time taken to sort: " . $time . "</h1>";

?>