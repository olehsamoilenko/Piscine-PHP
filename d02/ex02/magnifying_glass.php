#!/usr/bin/php
<?php
if (!file_exists($argv[1]))
	exit;
$str = file_get_contents($argv[1]);
$str = preg_replace_callback("#<a.*</a\s*>#si",
			function ($match) {
				$str = preg_replace_callback("#>[^<]*<#",
							function ($match) {
								return (strtoupper($match[0]));
							}, $match[0]);
				$str = preg_replace_callback("#title\s*=\s*\"[^\"]*\"#si",
							function ($match) {
								$pos = strpos($match[0], '"');
								$title = substr($match[0], 0, $pos);
								$text = substr($match[0], $pos);
								return ($title.strtoupper($text));
							}, $str);
				return ($str);
			}, $str);
print($str);
?>