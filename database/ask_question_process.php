<?php
header ( "Content-type:text/html; charset=utf-8" );
include_once 'connect.php';
session_start ();
$question_title = $_POST ['question_title'];
$question_category = $_POST ['question_category'];
$question_description = $_POST ['question_description'];
$question_user_name = $_SESSION ['username'];

ask_question ( $question_title, $question_category, $question_category, $question_description, $question_user_name );
function ask_question($question_title, $question_category, $question_category, $question_description, $question_user_name) {
	$connection = connect ();
	$sql = "insert into question(q_title, q_category, q_description, q_username) values (:q_title, :q_category, :q_description, :q_username)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':q_title' => $question_title,
			':q_category' => $question_category,
			':q_description' => $question_description,
			':q_username' => $question_user_name 
	) );
	$row = $result->rowCount ();
	if ($row == 0) {
		echo "<script>window.alert(\"提交问题失败，请重新提交\")</script>";
		echo "<script>window.location.href=\"../member/ask_question.php\"</script>";
		return;
	} else {
		echo "<script>window.alert(\"发表问题成功\")</script>";
		echo "<script>window.location.href=\"../index.php\"</script>";
		return;
	}
}
?>