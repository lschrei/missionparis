<?php
$query = 'SELECT * FROM Article ORDER BY Date_Ajout DESC LIMIT 8';
$resultSet = $pdo->query($query);
$articles = $resultSet->fetchAll();

$title = "Contact";
$view = "contact";
