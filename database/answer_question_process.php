<?php
header ( "Content-type:text/html; charset=utf-8" );
include_once 'connect.php';
session_start ();
$question_id = $_POST ['question_id'];
$answer_user_name = $_SESSION ['username'];
$answer_description = $_POST ['answer_content'];
answer_question ( $question_id, $answer_user_name, $answer_description );
function answer_question($question_id, $answer_username, $answer_content) {
	$connection = connect ();
	$sql = "insert into answer_question(question_id, answer_username, answer_content) values (:question_id, :answer_username, :answer_content)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':question_id' => $question_id,
			':answer_username' => $answer_username,
			':answer_content' => $answer_content 
	) );
	$sql = "update user set u_mark = u_mark + 1 where u_username=:u_username";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':u_username' => $answer_username 
	) );
	$row = $result->rowCount ();
	if ($row == 0) {
		echo "<script>window.alert(\"回答失败，请重新回答\")</script>";
		echo "<script>window.location.href=\"../member/browse_question_detail.php?question_id=" . $question_id . "\"</script>";
		return;
	} else {
		echo "<script>window.location.href=\"../member/browse_question_detail.php?question_id=" . $question_id . "\"</script>";
	}
}
?>