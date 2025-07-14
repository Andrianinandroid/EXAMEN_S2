<?php 
require("../inc/fonction.php");

$tout = get_tout();
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
<div class="card-body">
                                <p class="card-text"><strong>mauvais etat :</strong> <?= htmlspecialchars(get_isa()[1]) ?></p>
                                <p class="card-text"><strong>mauvais etat :</strong> <?= htmlspecialchars(get_isa()[0]) ?></p>

                            </div>
   
<div class="container mt-5">
        <h1 class="text-center mb-4">Liste des emprunts</h1>
        <div class="row">
            <?php if (!empty($tout)) {
                foreach ($tout as $objet) {
                $object = get_objets_par_id($objet['id_objet']);?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($object['nom_objet']) ?></h5>
                                <p class="card-text"><strong>Propriétaire :</strong> <?= htmlspecialchars($object['nom']) ?></p>
                                <p class="card-text"><strong>Catégorie :</strong> <?= htmlspecialchars($object['nom_categorie']) ?></p>
                                <p class="card-text"><strong>Catégorie :</strong> <?= htmlspecialchars($object['etat']) ?></p>
                                <a href="etat.php?id_objet=<?=$objet['id_objet']?>">
                            </a>
                            </div>
                        </div>
                    </div>
                <?php } }?>
        </div>
    </div>
</body>
</html>