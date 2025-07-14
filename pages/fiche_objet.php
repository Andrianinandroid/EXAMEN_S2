<?php 
require("../inc/fonction.php");
$idobj = $_GET['obj'];
$inf = get_objets_par_id($idobj);
$l_cat = get_list_categorie();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'objet</title>
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
          <a class="nav-link active" href="accueil.php">Accueil</a>
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
            <li><a class="dropdown-item" href="accueil.php">Voir tout</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Détail de l'objet -->
<div class="container mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card shadow">
                <?php 
                $image = !empty($inf['nom_image']) ? "../assets/images/objets/" . $inf['nom_image'] : "../assets/images/img3.jpg"; 
                ?>
                <img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="Image de l'objet" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title"><?= htmlspecialchars($inf['nom_objet']) ?></h2>
                    <p class="card-text">Propriétaire : <strong><?= htmlspecialchars($inf['nom']) ?></strong></p>
                    <p class="card-text">Catégorie : <strong><?= htmlspecialchars($inf['nom_categorie']) ?></strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des emprunts -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php 
            $liste_emprunt = get_info_emprunt($inf['id_objet']);
            if (!empty($liste_emprunt)) { ?>
                <h4 class="mb-3">Historique des emprunts</h4>
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Date d'emprunt</th>
                            <th>Date de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liste_emprunt as $l) { ?>
                        <tr>
                            <td><?= htmlspecialchars($l['date_emprunt']) ?></td>
                            <td><?= htmlspecialchars($l['date_retour']) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info text-center">
                    Aucun emprunt pour le moment...
                </div>
            <?php } ?>
        </div>
    </div>
</div>

</body>
</html>