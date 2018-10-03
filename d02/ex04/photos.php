#!/usr/bin/php
<?php
	$cd = curl_init("http://www.42.fr");
	$dir = parse_url("http://www.42.fr", PHP_URL_HOST);
	if (file_exists($dir)) {
		$dd = opendir($dir);
		while (FALSE !== ($file = readdir($dd))) {
			if ($file != "." && $file != "..")
				unlink($dir."/".$file);
		}
		closedir($dd);
		rmdir($dir);
	}
	mkdir($dir);
	curl_setopt($cd, CURLOPT_RETURNTRANSFER, TRUE); /* silence */
	$html = curl_exec($cd);
	preg_match_all("#<img.+src=\".+\".*>#i", $html, $images);
	foreach ($images as $elem) {
		$pos = strstr($elem, "src=\"");
		echo $pos."\n";
	}
	print_r($images);
?>