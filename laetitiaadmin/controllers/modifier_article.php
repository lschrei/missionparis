<?php

if (isset($_POST['modifier'])) {

	$query =
		'  
       UPDATE 
       Article
       SET
       Titre=?,texte=?,Tarif=?,DateEvenement=?,Mail=?,Adresse=?,Date_Suppression=?
       WHERE 
       Id=?
    ';


	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_POST['Titre'], $_POST['texte'], $_POST['Tarif'], $_POST['DateEvenement'], $_POST['Mail'], $_POST['Adresse'], $_POST['Date_Suppression'], $_GET['update']]);
}

if (isset($_GET['update'])) {

	$query = 'SELECT * FROM Article WHERE Id=?';
	$resultSet = $pdo->prepare($query);
	$resultSet->execute([$_GET['update']]);
	$modif = $resultSet->fetch();
}

$view = "modifier_article";
