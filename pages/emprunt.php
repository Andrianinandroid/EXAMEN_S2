<?php 
require("../inc/fonction.php");
$id = $_GET['id'];
var_dump($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement_emprunt.php?idm=<?= $id; ?>" method="get">
        <input type="number" name="nbj" id="">
        <input type="submit" value="VALIDER">
    </form>
</body>
</html>