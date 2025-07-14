<?php 
require("../inc/fonction.php");
$id = $_GET['idm'];
$nbj = $_GET['nbj'];
var_dump($id);
var_dump($nbj);

emprunter($id, $nbj, $_SESSION['id']);

?>