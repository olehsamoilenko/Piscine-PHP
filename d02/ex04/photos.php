#!/usr/bin/php
<?php
	$cd = curl_init($argv[1]);
	$dir = parse_url($argv[1], PHP_URL_HOST);
	if (file_exists($dir)) {
		$dd = opendir($dir);
		while (FALSE !== ($file = readdir($dd))) {
			if ($file != "." && $file != "..")
				unlink($dir . "/" . $file);
		}
		closedir($dd);
		rmdir($dir);
	}
	mkdir($dir);
	curl_setopt($cd, CURLOPT_RETURNTRANSFER, TRUE); /* silence */
	$html = curl_exec($cd);
	preg_match_all("#img.*src\s*=\s*\"([^\"]*\/([^\"]*))\"#im", $html, $images);
	for ($i = 0; $i < count($images[0]); $i++) {
		$cd = curl_init($images[1][$i]);
		curl_setopt($cd, CURLOPT_RETURNTRANSFER, TRUE); /* silence */
		$content = curl_exec($cd);
		file_put_contents($dir . "/" . $images[2][$i], $content);
	}
	curl_close($cd);
?>