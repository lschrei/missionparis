<?php
if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Admin
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Admin');
$admin = $resultSet->fetchAll();

$view = "liste_admins";