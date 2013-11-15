//initialize an ajax request object
function initAjax() {

	var ajax = null;

	// choose object type based upon what's happened
	if (window.XMLHttpRequest) {
		// for IE 7+, Mozilla, Safari, Firefox, Opera and most other browsers
		ajax = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		// for older IE browsers
		try {
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e1) {
			try {
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e2) {
			}
		}
	}
	return ajax;
}

function checkUsername() {
	var username = document.getElementById("username").value;
	var username_prompt = document.getElementById("username_span");
	if(!legal_username(username)) {
		username_prompt.innerHTML = "<img src=\"../material/warning.jpg\" alt=\"warning\" />";
		return;
	}
	var ajax = initAjax();
	if(!ajax) {
		alert("浏览器不支持ajax!");
		return;
	}
	var username = document.getElementById('username').value;
	var url = '../database/sign_up_process.php?username=' + encodeURI(username);
	ajax.open("GET", url, true);
	ajax.onreadystatechange = handleStateChange;
	ajax.send(null);
	if (legal_username(username)) {
		username_prompt.innerHTML = "<img src=\"../material/ok.jpg\" alt=\"ok\" />";
	}
}

/* username can only consist of alphabetic and number */
function legal_username(username) {
	var username_pattern = new RegExp("^[a-zA-Z][a-zA-Z0-9_]+$");
	return username_pattern.test(username);
}

function signUp() {
	var ajax = initAjax();
	if(!ajax) {
		alert("浏览器不支持ajax!");
		return;
	}
	var url = '../database/sign_up_process.php';
	var data = '';
	data += "username=" + document.getElementById('username').value;
	data += "password=" + document.getElementById('password').value;
	ajax.open("POST", url, true);
	
}


function handleStateChange() {
	if(ajax.readyState == 4){
		if(ajax.status == 200) {
			alert("success!");
		}
		else{
			alert("fail");
		}
	}
}