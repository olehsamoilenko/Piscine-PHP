var button = document.getElementById('add');
var list = document.getElementById('ft_list');
var n = 0;

// setCookie('oleh', 'value', 30);
// alert(getCookie('oleh'));
// alert(document.cookie);
// // возвращает cookie если есть или undefined
// function getCookie(name) {
//     var matches = document.cookie.match(new RegExp(
//       "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
//     ))
//     return matches ? decodeURIComponent(matches[1]) : undefined
// }

// // уcтанавливает cookie
// function setCookie(name, value, props) {
//     props = props || {}
//     var exp = props.expires
//     if (typeof exp == "number" && exp) {
//         var d = new Date()
//         d.setTime(d.getTime() + exp*1000)
//         exp = props.expires = d
//     }
//     if(exp && exp.toUTCString) { props.expires = exp.toUTCString() }
//     value = encodeURIComponent(value)
//     var updatedCookie = name + "=" + value
//     for(var propName in props){
//         updatedCookie += "; " + propName
//         var propValue = props[propName]
//         if(propValue !== true){ updatedCookie += "=" + propValue }
//     }
//     document.cookie = updatedCookie
// }

function remove_task(n) {
	var div = document.getElementById(n);
	if (confirm('Do you want to remove the task?')) {
		list.removeChild(div);
	}
}

button.addEventListener('click', function() {
	var div = document.createElement('div');
	var input = prompt('Enter your task, please:', '');
	if (input != '') {
		var text = document.createTextNode(input);
		div.appendChild(text);
		div.setAttribute('class', 'task');
		div.setAttribute('id', n);
		div.setAttribute('onclick', 'remove_task(' + n + ')');
		n++;
		// document.cookie = "username=John Smith; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/";
		// alert(document.cookie);
		list.insertBefore(div, list.firstChild);
	}
});

