<?php

$query = 'SELECT * FROM Categorie WHERE Id=?';
$resultSet = $pdo->prepare($query);
$resultSet->execute([$params[1]]);
$categorie = $resultSet->fetch();
$catid = $categorie['Id'];

$resultSet = $pdo->query('SELECT * FROM Article WHERE Cat_Id=' . $catid . ' ORDER BY Date_Ajout DESC');
$categorieArticle = $resultSet->fetchAll();

$title = "Mission Paris";
$view = "categorie";