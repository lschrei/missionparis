<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>

<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Article
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);

	$query =
		'  
           DELETE FROM
           Consulte
           WHERE 
           Article_Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Article');
$article = $resultSet->fetchAll();
?>

<div class="contenudashboard__principal">
	<div class="container__admin__container">
		<div class="admin__titre">
			<h4>Liste des articles</h4>
		</div>
		<div class="admin__table">
			<table class="admin__table__categorie">
				<thead>
					<tr>
						<th>Id</th>
						<!--modifier par le nombre de vues-->
						<th>Titre</th>
						<th>Date d'ajout</th>
						<th>Date de suppression</th>
						<th>Consulter</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($article as $arts) : ?>
							<td><?php echo $arts['Id'] ?></td>
							<td><?php echo $arts['Titre'] ?></td>
							<td><?php echo $arts['Date_Ajout'] ?></td>
							<td><?php echo $arts['Date_Suppression'] ?></td>
							<td><a href="../article/<?php echo $arts['Id'] ?>" target=”_blank” >Voir sur site</a></td>
							<td><a href="modifier_article.php?update=<?php echo $arts['Id'] ?>" target=”_blank” class="admin__supprimer">Modifier</a></td>
							<td><a href="liste_articles.php?delete=<?php echo $arts['Id'] ?>" class="admin__supprimer" onclick="return confirm('Confirmez la suppression?')"><i class="fa fa-trash"></i>Supprimer</a></td>
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