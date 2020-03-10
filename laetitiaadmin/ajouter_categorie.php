<?php include('header.php'); ?>
<?php include '../application/bdd-connection.php'; ?>
<?php
if (isset($_POST['ajouter'])) {
    $query =
        '  
           INSERT INTO
           Categorie
           (Nom)
           VALUES
           (?)
        ';

    $resultSet  = $pdo->prepare($query);
    $resultSet->execute([$_POST['Nom']]);
}
?>
<div class="contenudashboard__principal">
    <div class="admin__titre">
        <h4>Ajouter une catégorie sur le site</h4>
    </div>
    <div class="ajouter_formulaire">
        <form method="POST" class="admin__ajouter__formulaire">
            <br>
            <p>Nouvelle catégorie</p>
            <input type="text" id="Nom" name='Nom' class=" admin__formulaire">
            <button type="submit" name='ajouter' class="admin__bouton">Ajouter</button>
        </form>
    </div>
</div>
</div>
</div>
</main>
<script>
    document.getElementById("Nom").focus();
</script>
</body>

</html>