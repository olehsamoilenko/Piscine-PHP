$(document).ready(function() {
	n = 0;
	$res = $.ajax({
		url: 'select.php',
		success: function(response) {
			var arr = JSON.parse(response);
			if (Array.isArray(arr) && arr[0] != '') {
				for (i = 0; i < arr.length; i++) {
					if (arr[i] != '') {
						tmp = arr[i].split(';');
						$('#ft_list').prepend($("<div class='task'>" + tmp[1] + "</div>").click({num: tmp[0]}, remove_task));
					}
				}
			}
		}
	});

	$('#add').click(function() {
		var input = prompt('Enter your task, please:', '');
		if (input != '' && input != null) {
			n++;
			$('#ft_list').prepend($("<div class='task'>" + input + "</div>").click({num: n}, remove_task));
			$.ajax({
				type: 'GET',
				url: 'insert.php?key=' + n + '&value=' + input
			})
		}
	});
});


function remove_task(event) {
	if (confirm('Do you want to remove the task?')) {
		$.ajax({
			type: 'GET',
			url: 'delete.php?key=' + event.data.num
		})
		this.remove();
	}
}
