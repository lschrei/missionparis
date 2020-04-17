<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Article
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);

	$query =
		'  
           DELETE FROM
           Consulte
           WHERE 
           Article_Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Article');
$article = $resultSet->fetchAll();

$view = "liste_articles";