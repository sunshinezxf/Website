/*username can only consist of alphabetic and number*/
function legal_username(username) {
	var username_pattern = new RegExp("^[a-zA-Z][a-zA-Z0-9_]+$");
	return username_pattern.test(username);
}

/*connect to database to check whether username exists*/
function check_username(username) {
	if (ajax) {
		ajax.onreadystatechange = handle_check_username;
		ajax.open('GET', '../database/sign_up_process.php?username='
				+ encodeURIComponent(username), true);
		
		ajax.send();
	}
}

function handle_check_username() {
	if((ajax.readyState == 4) && ajax.status == 200){
		document.write("response text");
	}
}

