function check_username(username) {
	if (ajax) {
		ajax.open('GET', '../database/sign_up_process.php?username='
				+ encodeURIComponent(username));
	}
}