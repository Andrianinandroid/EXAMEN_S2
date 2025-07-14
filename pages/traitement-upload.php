<?php 
require("../inc/fonction.php");
upload($_POST['categorie'],$_POST['title'],$_SESSION['id']);
header("Location:accueil.php");
?>