<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="index, follow">
	<meta name="description" content="Toutes les sorties, concerts, expositions et matchs sur Paris">
	<!--css-->
	<link rel="stylesheet" href="<?= $homeDirectory; ?>css/normalize.css">
	<link rel="stylesheet" href="<?= $homeDirectory; ?>css/flexslider.css">
	<link rel="stylesheet" href="<?= $homeDirectory; ?>css/stylesheet.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="icon" type="image/svg" href="<?= $homeDirectory; ?>images/logo2.png">
	<!--favicon à mettre après avoir ajuster la taille-->
	<!--JQuery Slider-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?= $homeDirectory; ?>js/jquery.flexslider-min.js"></script>
	<!--Slider-->
	<script>
		$(window).on('load', function() {
			$('.flexslider').flexslider({
				directionNav: true,
				controlNav: true
			});
		});
	</script>
	<?php
	$query = 'SELECT * FROM Categorie';
	$resultSet = $pdo->query($query);
	$cats = $resultSet->fetchAll();
	?>
	<title><?= $title; ?> - Mission Paris</title>
</head>

<body>
	<header class="header">
		<div class="header__supplement">
			<p>Toute l'actualité culturelle de Paris</p>
			<span class="header__btn" onclick="openNav()"><i class="fa fa-search"></i><i class="fa fa-bars"></i></span>
		</div>
		<div class="container">
			<div class="header__nav">
				<div class="header__nav__nav">
					<a href="<?= $address ?>index"><img src="<?= $homeDirectory; ?>images/mission_paris-white.svg" alt="logo de mission paris"></a>

					<?php foreach ($cats as $cat) : ?>
						<nav>
							<a href="<?= $address; ?>categorie/<?php echo $cat['Id'] . '">' . $cat['Nom'] ?></a>							
						<?php endforeach; ?>						
						<a href='<?= $address; ?>contact' class="nav__contact">contact</a>
						</nav>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?= $homeDirectory; ?>js/javascript.js"></script>
	</header>
	<main>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" style="color:white" onclick="closeNav()">&times;</a>
			<form method='GET' action="<?= $address; ?>recherche" class="searchtop">
				<input type="search" name='q' class="header__search" placeholder="Rechercher...">
			</form>
			<?php foreach ($cats as $cat) : ?>
				<nav>
					<a href="<?= $address; ?>categorie/<?php echo $cat['Id'] . '">' . $cat['Nom'] ?></a>							
						<?php endforeach; ?>
						<a href='<?= $address; ?>contact' class="nav__contact">contact</a>
				</nav>
		</div>