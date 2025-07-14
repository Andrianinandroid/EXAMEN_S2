<?php 
require("../inc/fonction.php");
    if( empty($_GET['mail']) || empty($_GET['nom']) || empty($_GET['motdepasse']) || empty($_GET['naissance']) || empty($_GET['ville'])){
        header("Location:index.php");
            die();
    }
    insert_user($_GET['mail'],$_GET['nom'],$_GET['motdepasse'],$_GET['naissance'],$_GET['ville'],$_GET['genre']);
    $_SESSION['utilisateur']=$_GET['nom'];
    $_SESSION['id']=get_id($_GET['mail'],$_GET['motdepasse']);
    var_dump($_SESSION['utilisateur']);
    var_dump($_SESSION['id']);
    header("Location:accueil.php");
?>