/*determine whether the username is within legal limitation*/
function prompt_username() {
	var username = document.getElementById("username").value;
	var username_prompt = document.getElementById("username_span");
	if (legal_username(username)) {
		username_prompt.innerHTML = "<img src=\"../material/ok.jpg\" alt=\"ok\" />";
	} else {
		username_prompt.innerHTML = "<img src=\"../material/warning.jpg\" alt=\"warning\" />";
	}

}

/* username can only consist of alphabetic and number */
function legal_username(username) {
	var username_pattern = new RegExp("^[a-zA-Z][a-zA-Z0-9_]+$");
	return username_pattern.test(username);
}

/* prompt password */
function prompt_password() {
	var password = document.getElementById("password").value;
	var pass_prompt = document.getElementById("password_span");
	if (legal_password(password)) {
		pass_prompt.innerHTML = "<img src=\"../material/ok.jpg\" alt=\"ok\" />";
	} else {
		pass_prompt.innerHTML = "<img src=\"../material/warning.jpg\" alt=\"warning\" />";
	}
}

function legal_password(password) {
	var temp = password;
	return temp != null;
}

/* regiter password should be confirmed twice */
function same_password() {
	var temp_1 = document.getElementById("password").value;
	var temp_2 = document.getElementById("confirm_password").value;
	var password_prompt = document.getElementById("confirm_password_span");
	if (temp_1 != null) {
		if (temp_1 == temp_2) {
			password_prompt.innerHTML = "<img src=\"../material/ok.jpg\" alt=\"ok\" />";
		} else {
			password_prompt.innerHTML = "<img src=\"../material/warning.jpg\" alt=\"warning\" />";
		}
	}
}

/* connect to database to check whether username exists */
function check_username(username) {
	if (ajax) {
		ajax.onreadystatechange = handle_check_username;
		ajax.open('GET', '../database/sign_up_process.php?username='
				+ encodeURIComponent(username), true);

		ajax.send();
	}
}

function handle_check_username() {
	if ((ajax.readyState == 4) && ajax.status == 200) {
		document.write("response text");
	}
}
