<?php
require("../inc/fonction.php");
$objets = get_objets();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php if(!empty($objets)) {
             foreach($objets as $object){?>
                <p><?=$object['nom_objet']?></p>
                <p>proprietaire:<?=$object['nom']?></p>
                <p>categorie:<?=$object['nom_categorie']?></p>
            <?php } } ?>
</body>
</html>