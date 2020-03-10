<?php
if (!isset($_SESSION['Admin'])) {
	header('location:connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../css/stylesheetadmin.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="icon" href="">
	<!-- include summernote css/js pour l'éditeur de texte d'ajouter_article.php-->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
	<!-- include summernote css/js -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>



	<title>Dashboard - Mission Paris</title>
</head>

<body>
	<div class="header__logo">
		<a href="dashboard.php">
			<img src="../images/logo.png" alt="">
		</a>
		<a href='dashboard.php'>Bonjour <?php echo $_SESSION['Admin']; ?></a>
		<a href='logout.php'>Déconnexion</a>
	</div>

	<!-- LEFT BAR-->
	<div class="contenucompletadmin">
		<div class="admin__container">
			<div class="header__left">
				<ul>
					<li class="header__left__titre"><i class="fa fa-tachometer"></i>Tableau de bord</li>
					<li>
						<a href="dashboard.php">
							<p>Dashboard</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-pencil"></i>Article</li>
					<li>
						<a href="liste_articles.php">
							<p>Liste des articles</p>
						</a>
					</li>
					<li>
						<a href="ajouter_article.php">
							<p>Ajouter un article</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-table"></i>Catégorie</li>
					<li>
						<a href="liste_categories.php">
							<p>Liste des catégories</p>
						</a>
					</li>
					<li>
						<a href="ajouter_categorie.php">
							<p>Ajouter une catégorie</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-sliders"></i>Slider</li>
					<li>
						<a href="liste_sliders.php">
							<p>Liste des sliders</p>
						</a>
					</li>
					<li>
						<a href="ajouter_slider.php">
							<p>Ajouter un slider</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-search"></i>Recherche</li>
					<li>
						<a href="liste_recherche.php">
							<p>Liste des recherches</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-user"></i>Administrateur</li>
					<li>
						<a href="liste_admins.php">
							<p>Liste des administrateurs</p>
						</a>
					</li>
					<li>
						<a href="ajouter_admin.php">
							<p>Ajouter un administrateur</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<main>