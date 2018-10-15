/* Main */


/* popUp loginRegistration */

// function loginRegistration() {
//     document.getElementById('toggleLogin').onclick = function() {
//         openbox('windowLogin', this);
//         return false;
//     };
// };
function openBox(id, loginBoxContent) {
    var div = document.getElementById(id);
    var loginBoxContent_div = document.getElementById(loginBoxContent);
    if(div.style.display == 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}

function openBoxCreate(id, createBoxContent) {
    var div = document.getElementById(id);
    var createBoxContent_div = document.getElementById(createBoxContent);
    if(div.style.display == 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}

function docBox(id, docBoxContent) {
    var div = document.getElementById(id);
    var docBoxContent_div = document.getElementById(docBoxContent);
    if(div.style.display == 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}
