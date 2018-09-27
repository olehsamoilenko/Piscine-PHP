#!/usr/bin/php
<?php
$str = $argv[1];
$day = "([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)";
$month = "([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre)";
if (preg_match("/^".$day." \d{1,2} ".$month." \d{4} \d{2}:\d{2}:\d{2}$/", $str)) {
	$change = array(
						"/[Dd]imanche/" => "Sunday",
						"/[Ll]undi/" => "Monday",
						"/[Mm]ardi/" => "Tuesday",
						"/[Mm]ercredi/" => "Wednesday",
						"/[Jj]eudi/" => "Thursday",
						"/[Vv]endredi/" => "Friday",
						"/[Ss]amedi/" => "Saturday",
						"/[Jj]anvier/" => "January",
						"/[Ff]évrier/" => "February",
						"/[Mm]ars/" => "March",
						"/[Aa]vril/" => "April",
						"/[Mm]ai/" => "May",
						"/[Jj]uin/" => "June",
						"/[Jj]uillet/" => "July",
						"/[Aa]oût/" => "August",
						"/[Ss]eptembre/" => "September",
						"/[Oo]ctobre/" => "October",
						"/[Nn]ovembre/" => "November",
						"/[Dd]écembre/" => "December"
	);
	foreach ($change as $french => $english) {
		$str = preg_replace($french, $english, $str);
	}
	$res = strtotime($str);
	print("$res\n");
}
else {
	print("Wrong Format\n");
}
?>