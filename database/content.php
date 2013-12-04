<?php
include_once './connect.php';
?>
<!DOCTYPE html>
<html lang="en" style="background: transparent;">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../css/core.css" />
<title>content</title>
</head>
<body>
<?php
$connection = connect ();
$sql = "select * from question";
$result = $connection->prepare ( $sql );
$result->execute ();

while ( true ) {
	$temp = $result->fetch ( PDO::FETCH_ASSOC );
	if ($temp == null) {
		return;
	} else {
		$question_id = $temp ['q_id'];
		$question_tile = $temp ['q_title'];
		$question_category = $temp ['q_category'];
		$question_description = $temp ['q_description'];
		$q_path = $temp ['q_path'];
		
		echo "<div class=\"display module\">";
		echo "<div class=\"summary\">";
		echo "<h3>";
		echo "<a href=\"#\">" . $question_tile . "</a>";
		echo "</h3>";
		echo "<div class=\"question_content\">";
		echo "<div>" . $question_description . "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
}
?>
</body>
</html>