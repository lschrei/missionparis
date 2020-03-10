<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>
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
?>
<div class="contenudashboard__principal">
    <div class="admin__titre">
        <h4>Ajouter un administrateur</h4>
    </div>
    <div class="ajouter__formulaire">
        <form method="POST" class="admin__ajouter__formulaire">
            <p>Nouvel administrateur</p>
            <input type="text" id="User" name='User' class="admin__formulaire__admin"><br>
            <p>Mot de pase nouvel administrateur</p>
            <input type="password" name='Password' class="admin__formulaire__admin"><br>
            <button type="submit" name='ajouter' class="admin__bouton">Ajouter</button>
        </form>
    </div>
</div>
</div>
</main>
<script>
    document.getElementById("User").focus();
</script>
</body>

</html>