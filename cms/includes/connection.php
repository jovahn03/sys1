<?php

try {
		$pdo = new PDO('mysql:host=localhost;dbname=cms','admin','admin1');

} catch (PDOException $e) {

		exit('Database error.');

}

?>