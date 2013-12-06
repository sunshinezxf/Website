<?php
header ( "Content-type:text/html; charset=utf-8" );
include_once 'connect.php';
session_start ();
$to_username = $_POST ['to_username'];
$from_user_name = $_SESSION ['username'];
$message = $_POST ['message_content'];
leave_message ( $to_username, $from_user_name, $message );
function leave_message($to_username, $from_username, $message) {
	$connection = connect ();
	$sql = "insert into message(to_username, from_username, message) values (:to_username, :from_username, :message)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':to_username' => $to_username,
			':from_username' => $from_username,
			':message' => $message 
	) );
	$row = $result->rowCount ();
	echo $row;
	if ($row == 0) {
		echo "<script>window.alert(\"留言失败\")</script>";
		echo "<script>window.location.href=\"../member/personal_information.php?username=" . $to_username . "\"</script>";
	} else {
		echo "<script>window.location.href=\"../member/personal_information.php?username=" . $to_username . "\"</script>";
	}
}
?>