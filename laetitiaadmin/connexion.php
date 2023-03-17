<?php
require_once '../application/bdd-connection.php';

if (isset($_POST['login'])) {
	$query = 'SELECT * FROM Admin WHERE User=? AND Password=?';
	$resultSet = $pdo->prepare($query);
	$resultSet->execute([$_POST['User'], md5($_POST['Password'])]);
	$admin = $resultSet->fetch();

	if (isset($admin['Id'])) {
		$_SESSION['Admin'] = $_POST['User'];
		header('location:dashboard'); ›	
	}
	echo "Connexion impossible";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<link rel="stylesheet" href="../css/stylesheetadmin.css">

	<title>Connexion - Mission Paris</title>
</head>

<body>
	<div class="index__connexion">
		<img src="../images/logo.png">
		<p>Connexion au dashboard</p>
		<form method="POST">
			<input type="text" class="User" id="User" name="User" placeholder="Nom d'utilisateur" />
			<br>
			<input type="password" name="Password" placeholder="******" />
			<br>
			<input type="submit" value="connexion" name="login" />
		</form>
	</div>
	<script>
		document.getElementById("User").focus();
	</script>›
</body>