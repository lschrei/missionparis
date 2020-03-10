<?php
include '../application/bdd-connection.php';
include('header.php');

if(isset($_POST['modifier'])){

    $query =
    '  
       UPDATE 
       Article
       SET
       Titre=?,texte=?,Tarif=?,DateEvenement=?,Mail=?,Adresse=?,Date_Suppression=?
       WHERE 
       Id=?
    ';

        
    $resultSet  = $pdo ->prepare($query);
    $resultSet ->execute([$_POST['Titre'],$_POST['texte'],$_POST['Tarif'],$_POST['DateEvenement'],$_POST['Mail'],$_POST['Adresse'],$_POST['Date_Suppression'],$_GET['update']]);
        
}
?> 
<?php 

if(isset($_GET['update'])){
  
    $query = 'SELECT * FROM Article WHERE Id=?';
    $resultSet = $pdo-> prepare($query);
    $resultSet->execute([$_GET['update']]);
    $modif = $resultSet -> fetch();
    
     
}

?>
<div class="contenudashboard__principal">
	<div class="admin__titre">
		<h4>Ajouter un article sur le site</h4>
	</div>
	<div class="ajouter__formulaire">
		<form method="POST" class="admin__ajouter__formulaire" enctype="multipart/form-data">
			<br>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Titre</p><input type="text" id="Titre" name='Titre' class="admin__formulaire__width" value=" <?php echo $modif['Titre'] ?>" required>
				</div>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Date de l'évènement</p><input type="text" name='DateEvenement' class="admin__formulaire__width" min="2020-01-01" max="2025-12-31" value=" <?php echo $modif['DateEvenement'] ?>" required>
				</div>
				<div>
					<p>Date de suppression de l'article</p><input type="text" name='Date_Suppression' class="admin__formulaire__width" min="2020-01-01" max="2025-12-31" value=" <?php echo $modif['Date_Suppression'] ?>" required>
				</div>
			</div>
			<div>
				<p>Ajout du contenu et mise en page</p>
				<textarea id="summernote" name="texte" value="<?php echo $modif['texte'] ?>" ></textarea>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Tarif</p><input type="text" name='Tarif' class="admin__formulaire__width" value=" <?php echo $modif['Tarif'] ?>" required>
				</div>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Mail du site officiel</p><input type="text" name='Mail' class="admin__formulaire__width" value=" <?php echo $modif['Mail'] ?>" required>
				</div>
				<div>
					<p>Lieu de l'évènement</p><input type="text" name='Adresse' class="admin__formulaire__width" value=" <?php echo $modif['Adresse'] ?>" required>
				</div>
			</div>
			<br>
			<button type="submit" name='modifier' class="admin__bouton">Modifier</button>
		</form>
	</div>
</div>
</div>
</main>
<script>
	$(document).ready(function() {
		$('#summernote').summernote();
	});
	document.getElementById("Titre").focus();
</script>
</body>

</html>
