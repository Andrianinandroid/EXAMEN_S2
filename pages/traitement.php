<?php 
require("../inc/fonctions.php");
    if( empty($_GET['mail']) || empty($_GET['nom']) || empty($_GET['motdepasse']) || empty($_GET['naissance'])){
        header("Location:index.php");
            die();
    }
    insert_user($_GET['mail'],$_GET['nom'],$_GET['motdepasse'],$_GET['naissance']);
    $_SESSION['utilisateur']=$_GET['nom'];
    $_SESSION['id']=get_id($_GET['mail'],$_GET['motdepasse']);
    header("Location:accueil.php");
?>