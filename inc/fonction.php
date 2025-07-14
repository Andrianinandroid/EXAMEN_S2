<?php 
require ("connection.php");
session_start();
function insert_user($email,$nom,$motdepasse,$datedenaissance,$ville){
    $req = "insert into gestion_membre(email,eom,motdepasse,date_naissance,ville) values ('%s','%s','%s','%s','%s')";
    $req = sprintf($req,$email,$nom,$motdepasse,$datedenaissance,$ville);
    $envoi = mysqli_query(dbconnect(),$req);
}

function get_id($email,$motdepasse){
    $req="select id_membre from gestion_membre where email='%s' and motdepasse='%s'";
    $req = sprintf($req,$email,$motdepasse);
    $envoi = mysqli_query(dbconnect(),$req);
    $id = mysqli_fetch_assoc($envoi);
    return $id['id_membre'];
}
function verify_user($email,$motdepasse){
    $req = "select * from gestion_membre where email = '%s' and motdepasse = '%s' ";
    $req = sprintf($req,$email,$motdepasse);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
    if( empty($reponse)){
        return false;
    }
    else{
        return true;
    }
}

function get_info_member($email,$motdepasse){
    $req = "select * from gestion_membre where email = '%s' and motdepasse = '%s' ";
    $req = sprintf($req,$email,$motdepasse);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
    return $reponse;
}
function get_objets(){
    $req = "select * from gestion_v_info_objet";
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
?>