<?php
require("../inc/fonction.php");
$objets = get_objets(); // Doit retourner aussi 'nom_image'
$l_cat = get_list_categorie();
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body>

<script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">@emprunt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" href="accueil.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Catégories
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($l_cat as $cat) { ?>
              <li>
                <a class="dropdown-item" href="filtre.php?cat_no=<?= $cat['id_categorie'] ?>">
                  <?= htmlspecialchars($cat['nom_categorie']) ?>
                </a>
              </li>
            <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Voir tout</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container mt-5">
  <h1 class="text-left mb-4">Liste des objets:</h1>
  <div class="row">
    <?php if (!empty($objets)) {
      foreach ($objets as $object) { 
        $image = !empty($object['nom_image']) ? "../assets/images/objets/" . $object['nom_image'] : "../assets/images/img3.jpg"; ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="Image de l'objet" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($object['nom_objet']) ?></h5>
              <p class="card-text"><strong>Propriétaire :</strong> <?= htmlspecialchars($object['nom']) ?></p>
              <p class="card-text"><strong>Catégorie :</strong> <?= htmlspecialchars($object['nom_categorie']) ?></p>

              <?php if (est_emprunte($object)) {
                $info_emprunt = get_info_emprunt($object['id_objet']);
                foreach ($info_emprunt as $info) { ?>
                  <p class="text-danger"><strong>Date de retour :</strong> <?= htmlspecialchars($info['date_retour']) ?></p>
                <?php }
              } else { ?>
                <p class="text-success">Disponible</p>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php }
    } else { ?>
      <div class="col-12">
        <div class="alert alert-warning text-center">
          Aucun objet disponible.
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>