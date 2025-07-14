<?php 
require("../inc/fonction.php");

insert_etat($_GET['id_objet'],$_GET['etat']);
header("Location:liste_etat.php");
?>