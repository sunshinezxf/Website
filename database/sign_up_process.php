<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once 'connect.php';

$username = $_POST ['username'];
$password = $_POST ['password'];

sign_user ( $username, $password );

function sign_user($username, $password) {
	$connection = connect ();
	$sql = "select * from user where u_username = '" . $username . "'";
	$result = $connection->prepare ( $sql );
	$result->execute ();
	$user = $result->fetch ( PDO::FETCH_ASSOC );
	if ($user != null) {
		echo "用户名已经存在！";
		return;
	}
	$password = md5 ( $password );
	$sql = "insert into user(u_username, u_password) values ('" . $username . "', '" . $password . "')";
	$result = $connection->prepare ( $sql );
	$result->execute ();
}

?>