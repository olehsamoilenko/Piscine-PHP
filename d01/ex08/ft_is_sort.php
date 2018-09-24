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
?>