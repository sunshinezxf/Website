<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once 'connect.php';

$username = $_POST ['username'];
$password = $_POST ['password'];

sign_user ( $username, $password );
function sign_user($username, $password) {
	$connection = connect ();
	$sql = "select * from user where u_username=:u_username";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':u_username' => $username 
	) );
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user != null) {
		return "用户名已经存在！";
	}
	$password = md5 ( $password );
	$sql = "insert into user(u_username, u_password) values (:u_username, :u_password)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':u_username' => $username,
			':u_password' => $password 
	) );
	$row = $result->rowCount ();
	return ($row == 0) ? "注册失败" : "注册成功";
}

?>