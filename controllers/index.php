<?php
$resultSet = $pdo->query('SELECT * FROM Article ORDER BY Date_Ajout DESC LIMIT 8');
$articles = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT * FROM Article ORDER BY Date_Suppression ASC LIMIT 4');
$articlesDate = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT * FROM Article ORDER BY Date_Ajout ASC LIMIT 4');
$articlesNew = $resultSet->fetchAll();

$query = 'SELECT Article_Id, COUNT(*) AS cn FROM Consulte GROUP BY Article_Id ORDER BY Cn DESC LIMIT 8';
$resultSet = $pdo->query($query);
$articlesPop = $resultSet->fetchAll();

foreach ($articlesPop as $key => $article) {
	$result = $pdo->prepare("SELECT * FROM Article WHERE Id =? ");
	$result->execute([$article["Article_Id"]]);
	$articlesPop[$key] = $result->fetch();
}

$title = "Sorties, concerts, expos Paris";
$view = 'index';
