<?php
if (isset($_POST['ajouter'])) {
    $query =
        '  
           INSERT INTO
           Slider
           (Titre1,Titre2,Url,Image)
           VALUES
           (?,?,?,?)
        ';

    $resultSet  = $pdo->prepare($query);
    $resultSet->execute([$_POST['Titre1'], $_POST['Titre2'], $_POST['Url'], $_POST['Image']]);
}

$view = "ajouter_slider";