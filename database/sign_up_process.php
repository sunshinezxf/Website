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
		echo "<script>window.prompt(\"用户名已经存在，请重新注册\")</script>";
		echo "<script>window.location.href=\"../member/sign_up.php\"</script>";
		return;
	}
	$password = md5 ( $password );
	$sql = "insert into user(u_username, u_password) values (:u_username, :u_password)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':u_username' => $username,
			':u_password' => $password 
	) );
	$row = $result->rowCount ();
	if ($row == 0) {
		echo "<script>window.prompt(\"注册失败，请重新注册\")</script>";
		echo "<script>window.location.href=\"../member/sign_up.php\"</script>";
		return;
	} else {
		echo "<script>window.prompt(\"注册成功\")</script>";
		echo "<script>window.location.href=\"../member/login.php\"</script>";
		return;
	}
}

?>