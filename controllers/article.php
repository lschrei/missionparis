<?php  //regroupe dans ce fichier tout le php utilisé dans la page article
if (isset($params['1'])) {

    $query =
        '  
       INSERT INTO
       Consulte
       (Article_Id,Date_Consultation)
       VALUES
       (?,NOW())
    ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$params['1']]);
}

$resultSet = $pdo->prepare('SELECT * FROM Article WHERE Id=?');
$resultSet->execute([$params['1']]);
$articleComplet = $resultSet->fetch();

$resultSet = $pdo->query('SELECT * FROM Article ORDER BY Date_Ajout DESC LIMIT 4');
$articleS = $resultSet->fetchAll();

$title = $articleComplet["Titre"]; // il s'agit du title de la page ( $title créé dans index.php)
$view = "article"; //$view me permet de récupérer le nom du fichier, c'est utilisé dans index.php
