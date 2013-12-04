<?php
header ( "Content-type:text/html; charset=utf-8" );
include_once 'connect.php';
session_start ();
$question_title = $_POST ['question_title'];
$question_category = $_POST ['question_category'];
$question_description = $_POST ['question_description'];
$question_user_name = $_SESSION ['username'];
$question_pic = $_FILES ['picture'] ['name'];
$question_pic_tmp = $_FILES ['picture'] ['tmp_name'];
$question_pic_path = upload_picture ( $question_pic, $question_user_name, $question_pic_tmp );

ask_question ( $question_title, $question_category, $question_category, $question_description, $question_user_name, $question_pic_path );
function ask_question($question_title, $question_category, $question_category, $question_description, $question_user_name, $question_pic_path) {
	$connection = connect ();
	$sql = "insert into question(q_title, q_category, q_description, q_username, q_path) values (:q_title, :q_category, :q_description, :q_username, :q_path)";
	$result = $connection->prepare ( $sql );
	$result->execute ( array (
			':q_title' => $question_title,
			':q_category' => $question_category,
			':q_description' => $question_description,
			':q_username' => $question_user_name,
			':q_path' => $question_pic_path 
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
function upload_picture($question_file, $question_username, $question_file_tmp) {
	$pic_dir = "D:/Programming/PHP/Appserv/www/Website/picture/";
	$type = array (
			"jpg",
			"gif",
			"png",
			"jpeg" 
	);
	$adjust = strtolower ( get_suffix ( $question_file ) );
	if (in_array ( strtolower ( get_suffix ( $question_file ) ), $type )) {
		$filename = explode ( ".", $question_file );
		$filename [0] = random_file_name ( 20, $question_username );
		$name = implode ( ".", $filename );
		$destination = $pic_dir . $name;
	}
	move_uploaded_file ( $question_file_tmp, $destination );
	return $destination;
}
function get_suffix($filename) {
	return substr ( strrchr ( $filename, '.' ), 1 );
}
function random_file_name($length, $question_user_name) {
	$name = $question_user_name . '-';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen ( $chars ) - 1;
	mt_srand ( ( double ) microtime () * 1000000 );
	for($i = 0; $i < $length; $i ++) {
		$name .= $chars [mt_rand ( 0, $max )];
	}
	return $name;
}
?>