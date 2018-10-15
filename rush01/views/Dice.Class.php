#!/usr/bin/php
<?php
	class Dice {
		private $_value;
		private $_img;

		public function getValue() {
			return ($this->_value);
		}
		public function getImg() {
			return ($this->_img);
		}

		public function __construct() {
			$this->_value = rand(1, 6);
			$this->_img = 'resources/dice' . $this->_value . '.png';
		}
	}

	$z = new Dice();
	echo $z->getImg();
?>