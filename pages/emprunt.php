<?php 
require("../inc/fonction.php");
$id = $_GET['id'];
//var_dump($id);
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
                        <form action="traitement_emprunt.php" method="get">
                            <div class="mb-3">
                                <label for="mail" class="form-label">Emprunt</label>
                                <input type="number" class="form-control" name="nbj" placeholder="Nombre de jours" required>
                                <input type="hidden" name="idm" value="<?=$id?>">
                            </div>
                           
                            <div class="d-grid">
                                <input type="submit" value="Valider" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
</body>
</html>
                