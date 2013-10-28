<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once './connect.php';
if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user = validate_user($username, $password);
	if($user != null) {
		$_SESSION['username'] = $user['u_username'];
		$_SESSION['password'] = $user['u_password'];
	}
}
function validate_user($username, $password) {
	$connection = connect ();
	$sql = "select * from user where u_username='" . $username . "'";
	$result = $connection->prepare ( $sql );
	$result->execute ();
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user == null) {
		echo "用户名不存在！";
		return;
	}
	$password = md5($password);
	$sql = "select * from user where u_username='" . $username . "' and u_password='" . $password . "'";
	$result = $connection->prepare ( $sql );
	$result->execute ();
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user == null) {
		echo "密码错误！";
		return;
	}
	echo "登录成功!";
	return $user;
}
?>