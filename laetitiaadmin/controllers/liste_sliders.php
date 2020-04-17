<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Slider
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Slider');
$slider = $resultSet->fetchAll();

$view = "liste_sliders";