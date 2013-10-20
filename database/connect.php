<?php
function connect() {
	$dbms = "mysql";
	$db_name = 'website';
	$username = 'root';
	$password = '';
	$host = 'localhost';
	$dsn = "$dbms:host=$host;dbname=$db_name";
	try {
		$pdo = new PDO ( $dsn, $username, $password );
	} catch ( PDOException $pdoe ) {
		die ( $pdoe->getMessage() );
	}
	return $pdo;
}
?>