var button = document.getElementById('add');
var list = document.getElementById('ft_list');
var n = 0;

button.addEventListener('click', function() {
	var input = prompt('Enter your task, please:', '');
	if (input != '' && input != null) {
		n++;
		addToList(input, n);
		var date = new Date(new Date().getTime() + 3600 * 1000);
		document.cookie = n + '=' + input + '; expires=' + date;
	}
});

function addToList(input, n) {
	var div = document.createElement('div');
	var text = document.createTextNode(input);
	div.appendChild(text);
	div.setAttribute('class', 'task');
	div.setAttribute('id', n);
	div.setAttribute('onclick', 'remove_task(' + n + ')');
	list.insertBefore(div, list.firstChild);
}

function remove_task(num) {
	var div = document.getElementById(num);
	if (confirm('Do you want to remove the task?')) {
		var date = new Date(0);
		document.cookie = num + '=null; expires=' + date;
		list.removeChild(div);
	}
}

window.onload = function() {
	if (document.cookie != '') {
		arr = document.cookie.split('; ');
		for (cook in arr) {
			elem = arr[cook].split('=');
			addToList(elem[1], elem[0]);
			n = elem[0];
		}
	}
}
