<?php 
require("../inc/fonction.php");
$categories = get_list_categorie();?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nouvelle publication </title>
  <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body>

  <div class="upload-container">
    <h2>Nouvel objet</h2>
    <form action="traitement-upload.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Nom de l'objet</label>
        <input type="text" id="title" name="title" placeholder="Nom de l'objet" required>
      </div>
      <div class="form-group">
        <label for="description">Categorie</label>
        <!-- <textarea id="description" name="description" placeholder="Décrivez votre image ou vidéo..."></textarea> -->
        <select name="categorie" id="categorie">
          <?php foreach($categories as $cat) {?>
            <option value="<?=$cat['id_categorie']?>"><?=$cat['nom_categorie']?></option>
           <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="media">Images de l'objet</label>
        <input type="file" id="media" name="fichier" accept="image/*" required>
      </div>
      <button type="submit" class="btn-upload">Publier</button>
    </form>
    <div class="back-link">
      <a href="accueil.php">⬅ Retour </a>
    </div>
  </div>

</body>
</html>