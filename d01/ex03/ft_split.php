#!/usr/bin/php
<?php
function ft_split($str) {
	$arr = preg_split("/ {1,}/", $str);

	// foreach ($arr as $key => $elem)
	// 	if ($elem == "")
	// 		unset($arr[$key]);
	return ($arr);
}
print_r(ft_split($argv[1]));
?>