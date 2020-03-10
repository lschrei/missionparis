<?php include '../application/bdd-connection.php'; ?>

<?php include('header.php'); ?>
<?php
$resultSet = $pdo->query('SELECT Txt,COUNT(*) AS cn FROM Recherche GROUP BY Txt ORDER BY cn DESC LIMIT 5');
$search = $resultSet->fetchAll();

$resultSet = $pdo->query('SELECT Article_Id, COUNT(*) AS cn FROM Consulte GROUP BY Article_Id ORDER BY Cn DESC LIMIT 5');
$listeArticles = $resultSet->fetchAll();

foreach ($listeArticles as $key => $article) {
  $result = $pdo->prepare("SELECT Titre, Date_Ajout FROM Article WHERE Id =? ");
  $result->execute([$article["Article_Id"]]);
  $listeArticles[$key] = array_merge($listeArticles[$key], $result->fetch());
}
?>
<div class="dashbord__grid">
  <div class="dashboard__grid__vues">
    <p>Nombre de vues</p>
    <p id="vues"></p>
  </div>
  <div class="dashboard__grid__articles">
    <p>Nombre d'articles sur le site</p>
    <p id="articlet"></p>
  </div>
  <div class="dashboard__grid__recherches">
    <p>Le top 5 des recherches</p>

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
    <div id="piechart_3d" style="width: 100%; height: 100%;"></div>
  </div>

  <div class="dashboard__grid__semaine">
    <p>Nombre d'articles consultés depuis 7 jours</p>
    <p id="consultation"></p>
  </div>

  <div class="dashboard__grid__consultes">
    <p>Les articles les plus consultés</p>
    <ul>
      <?php foreach ($listeArticles as $article) : ?>
        <li><span><?= $article['Titre']; ?></span> ajouté le <?= date('d-m-y', strtotime($article['Date_Ajout'])); ?> et consulté <span><?= $article['cn']; ?> fois</span></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <!-- <div class="dashboard__grid__sondage">Sondage de la semaine</div>-->
</div>

</div>
</main>
<!--AJAX-->
<script type='text/javascript'>
  function ok() {
    $.ajax({
      dataType: "json",
      url: "data.php",
      success: function(data) {
        $('#vues').html(data[0]);
        $('#articlet').html(data[1]);
        $('#consultation').html(data[2]);
      }
    });
  }
  setInterval("ok()", 1000);
</script>
</body>

</html>