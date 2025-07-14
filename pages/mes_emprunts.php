<?php 
require("../inc/fonction.php");
echo $_SESSION['id'];
$mes_emprunts = get_emprunts($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body>
    
<div class="container mt-5">
        <h1 class="text-center mb-4">Liste des emprunts</h1>
        <div class="row">
            <?php if (!empty($mes_emprunts)) {
                foreach ($mes_emprunts as $objet) {
                $object = get_objets_par_id($objet['id_objet']);?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($object['nom_objet']) ?></h5>
                                <p class="card-text"><strong>Propriétaire :</strong> <?= htmlspecialchars($object['nom']) ?></p>
                                <p class="card-text"><strong>Catégorie :</strong> <?= htmlspecialchars($object['nom_categorie']) ?></p>
                                <a href="etat.php?id_objet=<?=$objet['id_objet']?>">
                            <button class="btn btn-success btn-sm" disabled>Retourner</button>
                            </a>
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