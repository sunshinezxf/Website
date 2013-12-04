<?php
include_once 'connect.php';
?>

<?php
function get_tag() {
	$tag_array = array ();
	$connection = connect ();
	$sql = "select * from tag";
	$result = $connection->prepare ( $sql );
	$result->execute ();
	while ( true ) {
		$temp = $result->fetch ( PDO::FETCH_ASSOC );
		if ($temp == null)
			return $tag_array;
		else {
			array_push ( $tag_array, $temp ['tag_name'] );
		}
	}
}
?>