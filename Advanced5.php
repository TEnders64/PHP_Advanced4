<?php
	set_time_limit(60);
	//var_dump(insertion_sort());
	$time_start = microtime(true);
	insertion_sort();

	function insertion_sort(){
		$list = make_array(10000);

		for ($i = 1; $i < count($list); $i++){
			$val = $list[$i];
			$index = $i-1;
			while ($index >= 0 && $val < $list[$index]){
				$temp = $list[$index]; 
				$list[$index] = $val; 
				$list[$index+1] = $temp;
				$index--;			
			}	
		}
		return $list;
	}

	function make_array($size){
		$nums = array();
		for ($x = 0; $x < $size; $x++){
			$nums[] = rand(0,10000);
		}
		return $nums;
	}

	$time_end = microtime(true);
	$time = $time_end - $time_start;
	echo "<h1>Seconds to sort: " . $time . "</h1>";
?>