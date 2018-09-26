#!/usr/bin/php
<?php
if (preg_match("/^([L|l]undi|[M|m]ardi|[M|m]ercredi|[J|j]eudi|[V|v]endredi|[S|s]amedi|[D|d]imanche) \d{1,2} ([J|j]anvier|[F|f]évrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]oût|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d]écembre) \d{4} \d{2}:\d{2}:\d{2}$/", $argv[1])) {
	$str = strtolower($argv[1]);
	$change = array(
					"dimanche" => "Sunday",
					"lundi" => "Monday",
					"mardi" => "Tuesday",
					"mercredi" => "Wednesday",
					"jeudi" => "Thursday",
					"vendredi" => "Friday",
					"samedi" => "Saturday",

					"janvier" => "January",
					"février" => "February",
					"mars" => "March",
					"avril" => "April",
					"mai" => "May",
					"juin" => "June",
					"juillet" => "July",
					"août" => "August",
					"septembre" => "September",
					"octobre" => "October",
					"novembre" => "November",
					"décembre" => "December",
					);
	foreach ($change as $key => $value) {
		$str = str_replace($key, $value, $str);
	}
	$res = strtotime($str);
	print("$res   $str\n");
}
else {
	print("Wrong Format\n");
}
// problem with february august and december
?>