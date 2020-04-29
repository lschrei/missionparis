<?php
if (!isset($params[1]) or empty($params[1])) {
	header("HTTP/1.0 404 Not Found");
	exit();
}
if ($params[1] == "like_btn") {

	echo ("Like +1");
} else {

	echo ("Dislike +1");
}
if(isset($params[1])){

//Récupération des likes et dislikes dans la BD	
$query =
		'  
           INSERT INTO
           LikeDislike
           (Avis, Article_Id)
           VALUES
           (?,?)
		';
	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$params[1],$params[2]]);
}

// verifier adresse ip $_SERVER['REMOTE_ADDR'];

exit();
