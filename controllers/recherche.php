<?php

if (isset($_GET['q'])) {

	$query =
		'  
       INSERT INTO
       Recherche
       (Txt,Date_R)
       VALUES
       (?,NOW())
    ';

	$resultSet = $pdo->prepare($query);
	$resultSet->execute([$_GET['q']]);
}

$query = "SELECT * FROM Article WHERE Titre LIKE '%" . $_GET['q'] . "%'";
$resultSet = $pdo->query($query);
$article = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT * FROM Article ORDER BY Date_Ajout DESC LIMIT 4');
$articles = $resultSet->fetchAll();

$title = "Mission paris - Recherche";
$view = "recherche";
