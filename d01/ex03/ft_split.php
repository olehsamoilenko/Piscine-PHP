<?php
function ft_split($str) {
	$str = trim($str);
	if ($str == "") {
		return (array());
	}
	$arr = preg_split("/ +/", $str);
	sort($arr);
	return ($arr);
}
?>