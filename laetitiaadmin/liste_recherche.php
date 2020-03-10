<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>

<?php
$resultSet = $pdo->query('SELECT Txt,COUNT(*) AS cn FROM Recherche GROUP BY Txt ORDER BY cn DESC LIMIT 10');
$recherche = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT * FROM Recherche ORDER BY Date_R DESC LIMIT 10');
$search = $resultSet->fetchAll();
?>

<div class="contenudashboard__principal">
	<div class="container__admin__container">
		<div class="admin__titre">
			<h4>Liste des recherches</h4>
		</div>
		<div class="admin__table">
			<br>
			<div class="admin__titre">
				<h4>Recherches les plus éffectuées</h4>
			</div>
			<table class="admin__table__categorie">
				<thead>
					<tr>
						<th>Mot recherché</th>
						<th>Nombre de recherche</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($recherche as $rechs) : ?>
							<td><?php echo $rechs['Txt'] ?></td>
							<td><?php echo $rechs['cn'] ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<br>
			<div class="admin__titre">
				<h4>Recherches les plus récentes</h4>
			</div>
			<table class="admin__table__categorie">
				<thead>
					<tr>
						<th>Mot recherché</th>
						<th>Date de la recherche</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($search as $searchs) : ?>
							<td><?php echo $searchs['Txt'] ?></td>
							<td><?php echo $searchs['Date_R'] ?></td>
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