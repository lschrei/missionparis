<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Categorie
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Categorie');
$categorie = $resultSet->fetchAll();

$view = "liste_categories";