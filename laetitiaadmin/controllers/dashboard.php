<?php
$resultSet = $pdo->query('SELECT Txt,COUNT(*) AS cn FROM Recherche GROUP BY Txt ORDER BY cn DESC LIMIT 5');
$search = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT Article_Id, COUNT(*) AS cn FROM Consulte GROUP BY Article_Id ORDER BY Cn DESC LIMIT 5');
$listeArticles = $resultSet->fetchAll();

foreach ($listeArticles as $key => $article) {
  $result = $pdo->prepare("SELECT Titre, Date_Ajout FROM Article WHERE Id =? ");
  $result->execute([$article["Article_Id"]]);
  $listeArticles[$key] = array_merge($listeArticles[$key], $result->fetch());
}

$view = "dashboard";