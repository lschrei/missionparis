
<?php include '../application/bdd-connection.php'; ?>
<?php
$resultSet = $pdo->query('SELECT Article_Id FROM Consulte ORDER BY Article_Id DESC LIMIT 1');
$consult = $resultSet->fetch();

$resultSet = $pdo->query('SELECT COUNT(*) AS  cn2 FROM Consulte WHERE Date_Consultation > (NOW() - INTERVAL 7 DAY)');
$consultation = $resultSet->fetch();

$resultSet = $pdo->query('SELECT COUNT(*)AS cn1 FROM Article');
$art = $resultSet->fetch();

$array = [$consult['Article_Id'] . ' vues', $art['cn1'] . ' articles', $consultation['cn2'] . ' consultations ces 7 derniers jours'];

header('Content-type: application/json');

echo json_encode($array);
?>