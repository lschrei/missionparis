<?php
if (isset($_POST['ajouter'])) {
	$query =
		'  
           INSERT INTO
           Admin
           (User,Password)
           VALUES
           (?,?)
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_POST['User'], md5($_POST['Password'])]);
}

$view = "ajouter_admin"; //$view me permet de récupérer le nom du fichier, c'est utilisé dans index.php