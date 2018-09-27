#!/usr/bin/php
<?php
// $fd = fopen($argv[1], "r");
// while ($line = fgets(($fd))) {
// 	$line = preg_replace_callback("/title=\".*\"/",
// 	function ($matches) {
// 		print_r($matches);
// 		$str = $matches[0];
		
// 		// $title = substr($str, 0, stripos($str, '"'));
// 		// $link = strtoupper(substr($str, stripos($str, '"')));
// 		// $matches[0] = $title.$link;
// 		// return ($matches);
// 	},
// 	$line);
// 	print("$line");
// }

$str = file_get_contents($argv[1]);
$tags = preg_split("#/a#", $str);
print_r($tags);
foreach ($tags as $value) {

}
// preg_replace_callback("/title *= *\".*\"/ is",
// 	function ($matches) {
// 		print_r($matches);
// 	}, $str);

// </A> TABLE TABLE = "  start  
   // end"
?>