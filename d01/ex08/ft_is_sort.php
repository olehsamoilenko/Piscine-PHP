#!/usr/bin/php
<?php
function ft_is_sort($tab) {
	$sort = $tab;
	
	sort($sort);
	if ($sort == $tab) {
		return (true);
	}
	else {
		return (false);
	}
}

// $arr = array("a", "abc", "xyz");
// $arr = array("z", "a", "abc", "xyz");
// print_r($arr);
// if (ft_is_sort($arr)) {
// 	print("sorted\n");
// }
// else {
// 	print("UNsorted\n");
// }
?>