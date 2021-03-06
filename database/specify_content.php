<?php
header ( "Content-type: text/html; charset=utf-8" );
include_once './connect.php';
include_once '../object/question.class.php';
?>
<!DOCTYPE html>
<html lang="en" style="background: transparent;">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="./css/core.css" />
<script type="text/javascript" src="../javascript/ajax.js"></script>
<title>content</title>
</head>
<?php
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
		break;
	} else {
		$question_id = $temp ['q_id'];
		$question_title = $temp ['q_title'];
		$question_category = $temp ['q_category'];
		$question_description = $temp ['q_description'];
		$question_username = $temp ['q_username'];
		$question_path = $temp ['q_path'];
		$question_like = $temp ['q_like'];
		$question = new question ( $question_id, $question_title, $question_category, $question_description, $question_username, $question_path, $question_like );
		
		echo "<div class=\"display module\">";
		echo "<div class=\"summary\">";
		echo "<h3>";
		echo "<a href=\"./member/browse_question_detail.php?question_id=" . urlencode ( $question_id ) . "\" target=\"_blank\">" . $question->get_question_title () . "</a>";
		echo "<a class=\"tag\">" . $question->get_question_category () . "</a>";
		echo "</h3>";
		echo "<div class=\"question_content\">";
		echo "<div>" . $question->get_question_description () . "</div>";
		if ($question_path) {
			echo "<img class=\"show\" src=\"./" . $question->get_question_path () . "\" />";
		}
		echo "<a href=\"javascript:void(0)\" onclick=\"likeInMain('" . $question->get_question_id () . "')\"><img class=\"like\" src=\"./material/like.jpg\" /><em id=\"" . $question->get_question_id () . "\">(" . $question->get_question_like () . ")</em></a>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
}
?>
</body>
</html>


