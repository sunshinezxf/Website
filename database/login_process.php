<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once './connect.php';
session_start();
if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$user = validate_user ( $username, $password );
	if ($user != null) {
		$_SESSION ['username'] = $user ['u_username'];
		$_SESSION ['password'] = $user ['u_password'];
		echo "<script>window.prompt(\"登录成功\")</script>";
		echo "<script>window.location.href=\"../index.php\"</script>";
	}
}
function validate_user($username, $password) {
	$connection = connect ();
	$sql = "select * from user where u_username=:u_username";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':u_username' => $username 
	) );
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user == null) {
		return null;
	}
	$password = md5 ( $password );
	$sql = "select * from user where u_username=:u_username and u_password=:u_password";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			'u_username' => $username,
			'u_password' => $password 
	) );
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user == null) {
		return null;
	}
	return $user;
}
?>