<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=GPBcms', 'gpbcms', 'CMS#Database');
} catch (PDOException $e) {
		exit('Databse error.');
	}

?>