<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>

<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Categorie
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Categorie');
$categorie = $resultSet->fetchAll();
?>

<div class="contenudashboard__principal">
	<div class="container__admin__container">
		<div class="admin__titre">
			<h4>Liste des catégories</h4>
		</div>
		<div class="admin__table">
			<table class="admin__table__categorie">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nom de la catégorie</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($categorie as $categori) : ?>
							<td><?php echo $categori['Id'] ?></td>
							<td><?php echo $categori['Nom'] ?></td>
							<td><a href="liste_categories.php?delete=<?php echo $categori['Id'] ?>" class="admin__supprimer" onclick="return confirm('Confirmez la suppression?')"><i class="fa fa-trash"></i> Supprimer</a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</main>
</body>

</html>