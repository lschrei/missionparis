<?php include '../application/bdd-connection.php'; ?>
<?php include('header.php'); ?>
<?php
if (isset($_POST['ajouter'])) {
    $query =
        '  
           INSERT INTO
           Slider
           (Titre1,Titre2,Url,Image)
           VALUES
           (?,?,?,?)
        ';

    $resultSet  = $pdo->prepare($query);
    $resultSet->execute([$_POST['Titre1'], $_POST['Titre2'], $_POST['Url'], $_POST['Image']]);
}
?>
<div class="contenudashboard__principal">
    <div class="admin__titre">
        <h4>Ajouter un slider sur le site</h4>
    </div>
    <div class="ajouter_formulaire">
        <form method="POST" class="admin__ajouter__formulaire">
            <br><input type="text" name='Titre1' class="admin__formulaire" value="Titre1">
            <br><input type="text" name='Titre2' class="admin__formulaire" value="Titre2">
            <br><input type="text" name='Url' class="admin__formulaire" value="Url">
            <br><input type="text" name='Image' class="admin__formulaire" value="Image">
            <button type="submit" name='ajouter' class="admin__bouton">Ajouter</button>
        </form>
    </div>
</div>
</div>
</main>
</body>

</html>