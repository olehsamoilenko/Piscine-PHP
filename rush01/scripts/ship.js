$(document).ready(function() {
	// console.log(document.cookie.indexOf('me'));
	if (document.cookie.indexOf('me') == -1) {
		location.reload();
	}
	$.ajax({
		url: 'start.php',
		success: function(responce) {
			parameters = JSON.parse(responce);
			
			$('#aster').css('display', 'none');
			$('#me').css('margin-top', parameters['top1']);
			$('#me').css('margin-left', parameters['left1']);
			$('#me').css('transform', 'rotate(' + parameters['rotation1'] + 'deg)');
			$('#enemy').css('margin-top', parameters['top2']);
			$('#enemy').css('margin-left', parameters['left2']);
			$('#enemy').css('transform', 'rotate(' + parameters['rotation2'] + 'deg)');
		}
	});

	$('#move1').click(function() {
		$.ajax({
			type: 'GET',
			url: 'move.php?p=me',
			success: moveMe
		});
	});

	$('#move2').click(function() {
		$.ajax({
			type: 'GET',
			url: 'move.php?p=enemy',
			success: moveEnemy
		});
	});

	$('#clockRotation1').click(function() {
		$.ajax({
			type: 'GET',
			url: 'clockRotate.php?p=me',
			success: moveMe
		});
	});

	$('#clockRotation2').click(function() {
		$.ajax({
			type: 'GET',
			url: 'clockRotate.php?p=enemy',
			success: moveEnemy
		});
	});

	$('#antiClockRotation1').click(function() {
		$.ajax({
			type: 'GET',
			url: 'antiClockRotate.php?p=me',
			success: moveMe
		});
	});

	$('#antiClockRotation2').click(function() {
		$.ajax({
			type: 'GET',
			url: 'antiClockRotate.php?p=enemy',
			success: moveEnemy
		});
	});

	$('#antiClockRotation2').click(function() {
		$.ajax({
			type: 'GET',
			url: 'antiClockRotate.php?p=enemy',
			success: moveEnemy
		});
	});

	$('#shoot1').click(function() {
		$.ajax({
			type: 'GET',
			url: 'shoot.php?p=me',
			success: function(responce) {
				parameters = JSON.parse(responce);
				$('#aster').css('margin-top', parameters['top'] + parameters['top_offset']);
				$('#aster').css('margin-left', parameters['left'] + parameters['left_offset']);
				throwStone(parameters['shoot_distance'], 500, parameters['rotation']);
				console.log(parameters['shoot_status']);
				if (parameters['shoot_status'] == 1) {
					setTimeout(function() {
						alert('Player ENEMY killed. Player ME won!');
						endGame();
					}, 1000);
					
				}
			}
		});
	});

	$('#shoot2').click(function() {
		$.ajax({
			type: 'GET',
			url: 'shoot.php?p=enemy',
			success: function(responce) {
				parameters = JSON.parse(responce);
				$('#aster').css('margin-top', parameters['top'] + parameters['top_offset']);
				$('#aster').css('margin-left', parameters['left'] + parameters['left_offset']);
				throwStone(parameters['shoot_distance'], 500, parameters['rotation']);
				console.log(parameters['shoot_status']);
				if (parameters['shoot_status'] == 1) {
					setTimeout(function() {
						alert('Player ME killed. Player ENEMY won!');
						endGame();
					}, 1000);
					
				}
			}
		});
	});

	// $('#shoot2').click(function() {
	// 	$.ajax({
	// 		type: 'GET',
	// 		url: 'getOffsets.php?p=enemy',
	// 		success: function(responce) {
	// 			parameters = JSON.parse(responce);
	// 			$('#aster').css('margin-top', parameters['top'] + parameters['top_offset']);
	// 			$('#aster').css('margin-left', parameters['left'] + parameters['left_offset']);
	// 			throwStone(200, 1000, parameters['rotation']);
	// 		}
	// 	});
	// });

	$('#end').click(endGame);
});

function throwStone(distance, time, rotation) {
	$('#aster').css('display', 'inline');
	for (var i = 0; i < distance / 10; i++) {
		setTimeout(function() {
			if (rotation == 0) {
				$('#aster').css('margin-top', '-=10');
			}
			else if (rotation == 90) {
				$('#aster').css('margin-left', '+=10');
			}
			else if (rotation == 180) {
				$('#aster').css('margin-top', '+=10');
			}
			else if (rotation == 270) {
				$('#aster').css('margin-left', '-=10');
			}
		}, time / (distance / 10) * i);
	}
	setTimeout(function() {
		$('#aster').css('display', 'none');
	}, time);
	
}

function moveMe(responce) {
	parameters = JSON.parse(responce);
	$('#me').css('margin-top', parameters['top']);
	$('#me').css('margin-left', parameters['left']);
	$('#me').css('transform', 'rotate(' + parameters['rotation'] + 'deg)');
	
	console.log(parameters);
	// console.log(document.cookie);
	// console.log(parameters['status']);
	if (parameters['status'] == 0) {
		alert('Player ME dead:( Player ENEMY won!');
		endGame();
	}
}

function moveEnemy(responce) {
	parameters = JSON.parse(responce);
	$('#enemy').css('margin-top', parameters['top']);
	$('#enemy').css('margin-left', parameters['left']);
	$('#enemy').css('transform', 'rotate(' + parameters['rotation'] + 'deg)');
	console.log(parameters);
	if (parameters['status'] == 0) {
		alert('Player ENEMY dead:( Player ME won!');
		endGame();
	}
}

function endGame() {
	$.ajax({
		url: 'endGame.php',
	});
	alert('GAME OVER!');
	location.reload();
}


