<?php 
require ("connection.php");

function insert_user($email,$nom,$mdp,$datedenaissance,$ville,$genre){
    $req = "insert into gestion_membre(email,nom,mdp,date_naissance,ville,genre,image_profil) values ('%s','%s','%s','%s','%s','%s',NULL)";
    $req = sprintf($req,$email,$nom,$mdp,$datedenaissance,$ville,$genre);
    $envoi = mysqli_query(dbconnect(),$req);
}

function get_id($email,$mdp){
    $req="select id_membre from gestion_membre where email='%s' and mdp='%s'";
    $req = sprintf($req,$email,$mdp);
    $envoi = mysqli_query(dbconnect(),$req);
    $id = mysqli_fetch_assoc($envoi);
    return $id['id_membre'];
}
function verify_user($email,$mdp){
    $req = "select * from gestion_membre where email = '%s' and mdp = '%s' ";
    $req = sprintf($req,$email,$mdp);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
    if( empty($reponse)){
        return false;
    }
    else{
        return true;
    }
}

function get_info_member($email,$mdp){
    $req = "select * from gestion_membre where email = '%s' and mdp = '%s' ";
    $req = sprintf($req,$email,$mdp);
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
function est_emprunte($id_objet){
    $req = "select * from gestion_emprunt where id_objet=%d";
    $req = sprintf($req,$id_objet);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
    if(empty($reponse))return false;
    else return true;
}
function get_info_emprunt($id_objet){
    $req = "select * from gestion_emprunt where id_objet = %d";
    $req = sprintf($req,$id_objet);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
function get_list_categorie(){
    $req = "select * from gestion_categorie_objet";
    $req = sprintf($req);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
function get_objets_par_categorie($id_cat){
    $req = "select * from gestion_v_info_objet where id_categorie=%d";
    $req = sprintf($req,$id_cat);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
function get_nom_categorie($id) {
    $req = "select nom_categorie from gestion_categorie_objet where id_categorie=%d";
    $req = sprintf($req, $id);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
     return $reponse['nom_categorie'];
}
function get_objets_par_id($id){
    $req = "select * from gestion_v_info_objet where id_objet=%d";
    $req = sprintf($req, $id);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
     return $reponse;
}
?>