<?php
if (isset($_POST['ajouter'])) {
    $query =
        '  
           INSERT INTO
           Categorie
           (Nom)
           VALUES
           (?)
        ';

    $resultSet  = $pdo->prepare($query);
    $resultSet->execute([$_POST['Nom']]);
}

$view = "ajouter_categorie";