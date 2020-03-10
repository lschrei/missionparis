<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>

<?php

if (isset($_GET['delete'])) {
	$query =
		'  
           DELETE FROM
           Slider
           WHERE 
           Id=?
        ';

	$resultSet  = $pdo->prepare($query);
	$resultSet->execute([$_GET['delete']]);
}

$resultSet = $pdo->query('SELECT * FROM Slider');
$slider = $resultSet->fetchAll();
?>

<div class="contenudashboard__principal">
	<div class="container__admin__container">
		<div class="admin__titre">
			<h4>Liste des sliders</h4>
		</div>
		<div class="admin__table">
			<table class="admin__table__categorie">
				<thead>
					<tr>
						<th>Id</th>
						<th>Titre</th>
						<th>Image</th>
						<th>Url</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($slider as $slids) : ?>
							<td><?php echo $slids['Id'] ?></td>
							<td><?php echo $slids['Titre1'] ?></td>
							<td><?php echo $slids['Image'] ?></td>
							<td><?php echo $slids['Url'] ?></td>
							<td><a href="liste_sliders.php?delete=<?php echo $slids['Id'] ?>" class="admin__supprimer"><i class="fa fa-trash-alt"></i> Supprimer</a></td>
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