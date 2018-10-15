$(document).ready(function() {
	n = 0;
	if (document.cookie != '') {
		arr = document.cookie.split('; ');
		for (cook in arr) {
			elem = arr[cook].split('=');
			addToList(elem[1], elem[0]);
			n = elem[0];
		}
	}

	$('#add').click(function() {
		var input = prompt('Enter your task, please:', '');
		if (input != '' && input != null) {
			n++;
			addToList(input, n);
			var date = new Date(new Date().getTime() + 3600 * 1000);
			document.cookie = n + '=' + input + '; expires=' + date;
		}
	});
});

function addToList(input, num) {
	$('#ft_list').prepend($("<div class='task'>" + input + "</div>").click({num: num}, remove_task));
}

function remove_task(event) {
	if (confirm('Do you want to remove the task?')) {
		var date = new Date(0);
		document.cookie = event.data.num + '=null; expires=' + date;
		this.remove();
	}
}
