<?php
	class Ship {
		private $_positionTop;
		private $_positionLeft;
		private $_positionBottom;
		private $_positionRight;
		private $_rotation;
		private $_headLeftOffset;
		private $_headTopOffset;
		private $_shootDistance;
		private $_shootPower;
		private $_status; // 1 - alive, 0 - dead

		public function __construct($positionLeft, $positionTop, $rotation) {
			$this->_positionLeft = $positionLeft;
			$this->_positionTop = $positionTop;
			$this->_positionBottom = $positionTop + 105;
			$this->_positionRight = $positionLeft + 50;
			$this->_rotation = $rotation;
			$this->_changeOffsets();
			$this->_shootDistance = 200;
			$this->_shootPower = 5;
			$this->_status = 1;
		}
		public function getLeft() {
			return ($this->_positionLeft);
		}
		public function getTop() {
			return ($this->_positionTop);
		}
		public function getBottom() {
			return ($this->_positionBottom);
		}
		public function getRight() {
			return ($this->_positionRight);
		}
		public function getRotation() {
			return ($this->_rotation);
		}
		public function getLeftOffset() {
			return ($this->_headLeftOffset);
		}
		public function getTopOffset() {
			return ($this->_headTopOffset);
		}
		public function getShootDistance() {
			return ($this->_shootDistance);
		}
		public function getShootPower() {
			return ($this->_shootPower);
		}
		public function getStatus() {
			return ($this->_status);
		}

		public function move() {
			if ($this->_rotation == 0) {
				$this->_positionTop -= 10;
				$this->_positionBottom -= 10;
			}
			else if ($this->_rotation == 180) {
				$this->_positionTop += 10;
				$this->_positionBottom += 10;
			}
			else if ($this->_rotation == 90) {
				$this->_positionLeft += 10;
				$this->_positionRight += 10;
			}
			else {
				$this->_positionLeft -= 10;
				$this->_positionRight -= 10;
			}
			// $map = unserialize($_COOKIE['map']);
			$file = file_get_contents('map.txt');
			$map = explode("\n", $file);
			// if ($map[$this->_positionTop / 10][$this->_positionLeft / 10] == 'X') {
			if(	$map[($this->_positionTop + $this->_headTopOffset) / 10]
					[($this->_positionLeft + $this->_headLeftOffset) / 10] == 'X') {
					$this->_status = 0;
				}
			else {
				$this->_status = 1;
			}
				// $this->_status = $this->_positionTop / 10 . ' ' . $this->_positionLeft / 10 . 
				// $map[$this->_positionTop / 10][$this->_positionLeft / 10];
			// } 
		}
		public function clockRotate() {
			$this->_rotation = ($this->_rotation + 90) % 360;
			$this->_changeOffsets();
		}
		public function antiClockRotate() {
			$this->_rotation = ($this->_rotation - 90) % 360;
			if ($this->_rotation < 0) {
				$this->_rotation += 360;
			}
			$this->_changeOffsets();
		}

		private function _changeOffsets() {
			if ($this->_rotation == 0) {
				$this->_headLeftOffset = 7;
				$this->_headTopOffset = 0;
			}
			else if ($this->_rotation == 90) {
				$this->_headLeftOffset = 45;
				$this->_headTopOffset = 35;
			}
			else if ($this->_rotation == 180) {
				$this->_headLeftOffset = 7;
				$this->_headTopOffset = 80;
			}
			else if ($this->_rotation == 270) {
				$this->_headLeftOffset = -35;
				$this->_headTopOffset = 35;
			}
		}
	}
?>