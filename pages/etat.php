<?php
require("../inc/fonction.php");
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
                    <div class="card-body">
                        <form action="traitement_etat.php" method="get">
                            <div class="mb-3">
                                <select name="etat" id="etat">
                                    <option value="Mauvais">En bonne etat</option>
                                    <option value="Bon">En mauvaise etat</option>

                            </select>
                            <input type="hidden" name="id_objet" value="<?=$_GET['id_objet']?>">
                            </div>
                           
                            <div class="d-grid">
                                <input type="submit" value="Valider" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
</body>
</html>