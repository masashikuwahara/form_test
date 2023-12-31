<?php
function dbconnect() {
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=test", "root", "");
    if (!$db) {
		die($db->error);
	}

    return $db;
}

?>