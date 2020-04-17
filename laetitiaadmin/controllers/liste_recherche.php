<?php
$resultSet = $pdo->query('SELECT Txt,COUNT(*) AS cn FROM Recherche GROUP BY Txt ORDER BY cn DESC LIMIT 10');
$recherche = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT * FROM Recherche ORDER BY Date_R DESC LIMIT 10');
$search = $resultSet->fetchAll();

$view = "liste_recherche";