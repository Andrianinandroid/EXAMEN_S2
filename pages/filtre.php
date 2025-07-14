<?php 
require("../inc/fonction.php");
$cat = $_GET['cat_no'];
$l_cat = get_list_categorie();
$liste = get_objets_par_categorie($cat);
// var_dump($liste);
?>


<!DOCTYPE html>
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

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">EMPLOYES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="accueil.php">Home</a>
          </li>
        
          <li class="nav-item dropdown">
            
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
          </a>
          <ul class="dropdown-menu">
            <?php foreach($l_cat as $cat) {?>
              <li><a class="dropdown-item" href="filtre.php?cat_no=<?=$cat['id_categorie']?>">
              <?=$cat['nom_categorie']?>
            </a></li>
            <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">See all</a></li>
          </ul>
        </li>

           
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des objets dans la categorie <?= get_nom_categorie($_GET['cat_no'])?></h1>
        <div class="row">
            <?php if (!empty($liste)) {
                foreach ($liste as $object) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
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