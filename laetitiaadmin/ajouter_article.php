<?php
include '../application/bdd-connection.php';
include('header.php');

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
					<p>Titre</p><input type="text" id="Titre" name='Titre' class="admin__formulaire__width" required>
				</div>
				<div>
					<p>Categorie de l'article</p>
					<select class="admin__formulaire__width" name='Cat_Id'>
						<?php foreach ($categories as $categorie) : ?>
							<option value="<?php echo $categorie['Id'] ?>"><?php echo $categorie['Nom'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Dates de l'évènement</p><input type="date" name='DateEvenement' class="admin__formulaire__width" min="2020-01-01" max="2025-12-31" required>
				</div>
				<div>
					<p>Date de suppression de l'article</p><input type="date" name='Date_Suppression' class="admin__formulaire__width" min="2020-01-01" max="2025-12-31" required>
				</div>
			</div>
			<div>
				<p>Ajout du contenu et mise en page</p>
				<textarea id="summernote" name="texte"></textarea>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Tarif</p><input type="text" name='Tarif' class="admin__formulaire__width" required>
				</div>
				<div>
					<p>Image</p><input type="file" name="Image" id="Image" class="admin__formulaire__width" required>
				</div>
			</div>
			<div class="ajouter__formulaire__flex">
				<div>
					<p>Mail du site officiel</p><input type="text" name='Mail' class="admin__formulaire__width" required>
				</div>
				<div>
					<p>Lieu de l'évènement</p><input type="text" name='Adresse' class="admin__formulaire__width" required>
				</div>
			</div>
			<br>
			<button type="submit" name='ajouter' class="admin__bouton">Ajouter</button>
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
