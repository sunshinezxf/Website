function legal_username(username) {
	var username_pattern = new RegExp("^[a-zA-Z][a-zA-Z0-9_]+");
	if(!username_pattern.test()){
		window.alert("illegal!");
	}
}

function check_username(username) {
	if (ajax) {
		ajax.open('GET', '../database/sign_up_process.php?username='
				+ encodeURIComponent(username));
	}
}