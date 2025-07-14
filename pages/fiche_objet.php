<?php 
require("../inc/fonction.php");
$idobj = $_GET['obj'];
$inf = get_objets_par_id($idobj);
var_dump($inf);
$l_cat = get_list_categorie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="row mt-5">
                <div class="row ms-2">
                <div class="col-6 text-start">
               <h1><?= $inf['nom_objet']; ?></h1>
                </div>
                
                </div>

                <div class="card ps-5 mb-5">
                <div class="card-body text-start">
                    <h5 class="card-title">De <?= $inf['nom']; ?></h5>
                </div>
                <?php 
                $image = !empty($inf['nom_image']) ? "../assets/images/objets/" . $inf['nom_image'] : "../assets/images/img3.jpg"; 
                ?>
                <img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="Image de l'objet" style="object-fit: cover;" width=500px height=300px>
                <!-- <img src="../assets/image/m<?= $inf['id_propriete']; ?>.jpeg" alt="..." width=500px> -->

        </div>
    </div>

    <div class="row">
        <?php 
            $liste_emprunt = get_info_emprunt($inf['id_objet']);
            var_dump($liste_emprunt);
            if (!empty($liste)) {
                foreach ($liste as $l) {
                    ?>
                    <table>
                        <tr>
                            <th>Emprunteur</th>
                            <th>Date emprunt</th>
                            <th>Date emprunt</th>
                        </tr>
                    </table>
                    <?php 
                }
            }
        ?>
    </div>

</body>
</html>


