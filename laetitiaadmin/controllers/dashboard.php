<?php
//Le nombre de recherches
$resultSet = $pdo->query('SELECT Txt,COUNT(*) AS cn FROM Recherche GROUP BY Txt ORDER BY cn DESC LIMIT 5');
$search = $resultSet->fetchAll();

//Nombre de consultation par article
$resultSet = $pdo->query('SELECT Article_Id, COUNT(*) AS cn FROM Consulte GROUP BY Article_Id ORDER BY Cn DESC LIMIT 5');
$listeArticles = $resultSet->fetchAll();

foreach ($listeArticles as $key => $article) {
  $result = $pdo->prepare("SELECT Titre, Date_Ajout FROM Article WHERE Id =? ");
  $result->execute([$article["Article_Id"]]);
  $listeArticles[$key] = array_merge($listeArticles[$key], $result->fetch());
}

//Comptabiliser le nombre de like
$resultSet = $pdo->query('SELECT Article_Id, COUNT(*) AS cn FROM LikeDislike WHERE Avis = "like_btn" GROUP BY Article_Id ORDER BY Cn DESC LIMIT 1');
$likeDislike = $resultSet->fetchAll();

foreach ($likeDislike as $avis => $articles) {
  $result = $pdo->prepare("SELECT Titre, Date_Ajout FROM Article WHERE Id =? ");
  $result->execute([$articles["Article_Id"]]);
  $likeDislike[$avis] = array_merge($likeDislike[$avis], $result->fetch());
}
//Comptabiliser le nombre de dislike

$resultSet = $pdo->query('SELECT Article_Id, COUNT(*) AS cn FROM LikeDislike WHERE Avis = "dislike_btn" GROUP BY Article_Id ORDER BY Cn DESC LIMIT 1');
$likeDislikes = $resultSet->fetchAll();

foreach ($likeDislikes as $avisDislike => $articleDislike) {
  $result = $pdo->prepare("SELECT Titre, Date_Ajout FROM Article WHERE Id =? ");
  $result->execute([$articles["Article_Id"]]);
  $likeDislikes[$avisDislike] = array_merge($likeDislikes[$avisDislike], $result->fetch());
}

$view = "dashboard";