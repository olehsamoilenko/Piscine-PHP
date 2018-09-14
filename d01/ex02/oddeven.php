#!/usr/bin/php
<?php
while (true) {
	printf("Enter a number: ");
	$s = fgets(STDIN);
	if ($s == "") {
		print("\n");
		break ;
	}
	$s = trim($s, "\n");
	if(is_numeric($s)) {
		if ($s % 2 == 0) {
			print("The number $s in even\n");
		}
		else {
			print("The number $s in odd\n");
		}
	}
	else {
		print("'$s' is not a number\n");
	}
}
?>