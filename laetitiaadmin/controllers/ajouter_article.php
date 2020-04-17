<?php
if (isset($_POST['ajouter'])) {

	$filename = rand(1111, 9999) . "_" . time(); //p our renommer l'image
	$extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
	$newname = $filename . '.' . $extension;

	$source = $_FILES['Image']['tmp_name'];
	$destination = "../images/" . $newname;

	move_uploaded_file($source, $destination);

	$query =
		'  
           INSERT INTO
           Article
           (Titre,Image,texte,Cat_Id,Tarif,DateEvenement,Mail,Adresse,Date_Ajout,Date_Suppression)
           VALUES
           (?,?,?,?,?,?,?,?,NOW(),?)
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_POST['Titre'], $newname, $_POST['texte'], $_POST['Cat_Id'], $_POST['Tarif'], $_POST['DateEvenement'], $_POST['Mail'], $_POST['Adresse'], $_POST['Date_Suppression']]);
}

$resultSet = $pdo->query('SELECT * FROM Categorie');
$categories = $resultSet->fetchAll();

$view = "ajouter_article";