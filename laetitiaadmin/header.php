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
	<link rel="stylesheet" href="<?= $homeDirectory; ?>/css/stylesheetadmin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="icon" href="<?= $homeDirectory; ?>/images/logo.png">
	<!-- script de l'éditeur de texte -->
	<script src="https://cdn.tiny.cloud/1/ocf3g43wcxzm2xaf4483e1ct3euq0ezio9a3hik0t6648ee3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
	</script>
	    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {
        packages: ["corechart"]
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['requete', 'nombre de requete'],
          <?php foreach ($search as $searchs) : ?>

            ['<?php echo $searchs['Txt'] ?>', <?php echo $searchs['cn'] ?>],

          <?php endforeach; ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
	<!-- include summernote css/js pour l'éditeur de texte d'ajouter_article-->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
	<!-- include summernote css/js -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
	<script type="text/javascript" src="<?= $homeDirectory; ?>js/javascript.js"></script>



	<title>Dashboard - Mission Paris</title>
</head>

<body>
	<div class="header__logo">
		<a href="<?= $address; ?>dashboard">
			<img src="<?= $homeDirectory; ?>/images/logo.png" alt="">
		</a>
		<a href='<?= $address; ?>dashboard'>Bonjour <?php echo $_SESSION['Admin']; ?></a>
		<a href='<?= $address; ?>logout'>Déconnexion</a>
	</div>

	<!-- LEFT BAR-->
	<div class="contenucompletadmin">
		<div class="admin__container">
			<div class="header__left">
				<ul>
					<li class="header__left__titre"><i class="fa fa-tachometer"></i>Tableau de bord</li>
					<li>
						<a href="<?= $address; ?>dashboard">
							<p>Dashboard</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-pencil"></i>Article</li>
					<li>
						<a href="<?= $address; ?>liste_articles">
							<p>Liste des articles</p>
						</a>
					</li>
					<li>
						<a href="<?= $address; ?>ajouter_article">
							<p>Ajouter un article</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-table"></i>Catégorie</li>
					<li>
						<a href="<?= $address; ?>liste_categories">
							<p>Liste des catégories</p>
						</a>
					</li>
					<li>
						<a href="<?= $address; ?>ajouter_categorie">
							<p>Ajouter une catégorie</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-sliders"></i>Slider</li>
					<li>
						<a href="<?= $address; ?>liste_sliders">
							<p>Liste des sliders</p>
						</a>
					</li>
					<li>
						<a href="<?= $address; ?>ajouter_slider">
							<p>Ajouter un slider</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-search"></i>Recherche</li>
					<li>
						<a href="<?= $address; ?>liste_recherche">
							<p>Liste des recherches</p>
						</a>
					</li>
					<li class='header__left__titre'><i class="fa fa-user"></i>Administrateur</li>
					<li>
						<a href="<?= $address; ?>liste_admins">
							<p>Liste des administrateurs</p>
						</a>
					</li>
					<li>
						<a href="<?= $address; ?>ajouter_admin">
							<p>Ajouter un administrateur</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<main>