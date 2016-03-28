<?php
/* Define database */
define("SQL_HOST", "localhost");
define("SQL_USER", "root");
define("SQL_PASS", "");
define("SQL_DBNAME", "beefore");
try {
	$dbh = new PDO("mysql:dbname=".SQL_DBNAME.";host=".SQL_HOST,SQL_USER,SQL_PASS."");
}
catch (Exception $e) {
	die('Erreur : '.$e->getMessage());
}
?>