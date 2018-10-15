<?php
	file_put_contents('list.csv', $_GET['key'] . ';' . $_GET['value'] . PHP_EOL, FILE_APPEND);
?>