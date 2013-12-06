<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once './connect.php';
include_once '../object/question.class.php';
$question_id = $_GET ['q_id'];
$connection = connect ();
$sql = "update question set q_like = q_like + 1 where q_id = :q_id";
$result = $connection->prepare ( $sql );
$result->execute ( array (
		':q_id' => $question_id 
) );
$sql = "select q_like from question where q_id = :q_id";
$result = $connection->prepare ( $sql );
$result->execute ( array (
		':q_id' => $question_id 
) );
$temp = $result->fetch ( PDO::FETCH_ASSOC );
echo $temp ['q_like'];
?>
