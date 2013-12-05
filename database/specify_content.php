<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once './connect.php';
session_start ();
?>
<?php

echo "<!DOCTYPE html>";
echo "<html lang=\"en\">";
echo "<head>";
echo "<meta charset=\"utf-8\" />";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/core.css\" />";
echo "<title>content</title>";
echo "</head>";
echo "<body>";
$type = $_GET ['tag'];
$connection = connect ();
$sql = "select * from question where q_category=:q_category order by q_id desc";
$result = $connection->prepare ( $sql );
$result->execute ( array (
		':q_category' => $type 
) );
while ( true ) {
	$temp = $result->fetch ( PDO::FETCH_ASSOC );
	if ($temp == null) {
		return;
	} else {
		$question_id = $temp ['q_id'];
		$question_title = $temp ['q_title'];
		$question_category = $temp ['q_category'];
		$question_description = $temp ['q_description'];
		$question_username = $temp ['q_username'];
		$question_path = $temp ['q_path'];
		$question = new question ( $question_id, $question_title, $question_category, $question_description, $question_username, $question_path );
		
		echo "<div class=\"display module\">";
		echo "<div class=\"summary\">";
		echo "<h3>";
		echo "<a href=\"#\">" . $question->get_question_title () . "</a>";
		echo "<a class=\"tag\">" . $question->get_question_category () . "</a>";
		echo "</h3>";
		echo "<div class=\"question_content\">";
		echo "<div>" . $question->get_question_description () . "</div>";
		if ($question_path) {
			echo "<img class=\"show\" src=\"" . $question->get_question_path () . "\" />";
		}
		echo "<img class=\"like\" src=\"../material/like.jpg\" />";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
}
echo "</body>";
echo "</html>";
?>


