<?php
function ft_split($str) {
	$str = trim($str);
	while (strstr($str, "  ")) {
		$str = str_ireplace("  ", " ", $str);
	}
	if ($str != "") {
		$arr = explode(' ', $str);
	}
	else {
		$arr = array();
	}
	sort($arr);
	// print_r($arr);
	return ($arr);
}
// ft_split(" ");
?>