<?php
$query = "SELECT Titre FROM Article WHERE Titre LIKE '%" . $params[1] . "%'";
$resultSet = $pdo->query($query);
$rechercheArticle = $resultSet->fetchAll(PDO::FETCH_ASSOC);//pour ne pas dupliquer le champ
echo json_encode($rechercheArticle);
exit();//indispensable pour stopper mon code
