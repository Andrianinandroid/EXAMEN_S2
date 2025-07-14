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
function insert_objet($id_membre, $id_categorie,$nom_objet){
        $req = "insert into gestion_objet (id_membre,nom_objet,id_categorie) values (%d,'%s',%d)";
        $req = sprintf($req,$id_membre,$nom_objet,$id_categorie);
        $envoi = mysqli_query(dbconnect(),$req);
}
function insert_image($id_objet,$nom_image){
    $req = "insert into gestion_images_objet (id_objet,nom_image) values (%d,'%s')";
    $req = sprintf($req,$id_objet,$nom_image);
    $envoi = mysqli_query(dbconnect(),$req);
}

function upload($id_categorie,$nom_objet,$id_membre){
    $uploadDir = __DIR__ . '/../assets/uploads/';
    $maxSize = 20 * 1024 * 1024; // 20 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
        $file = $_FILES['fichier'];
       
            // $file = $_FILES['fichier'];
            if ($file['error'] !== UPLOAD_ERR_OK) {
                die('Erreur lors de l’upload : ' . $file['error']);
        }

    if ($file['size'] > $maxSize) {
        die('Le fichier est trop volumineux.');
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
    }

    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = 'pub' . '_' . uniqid() . '.' . $extension;

    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        echo "Fichier uploadé avec succès : ". $newName;
    } else {
        echo "Échec du déplacement du fichier.";
    }
      insert_image($id_objet,$newName);
        }
     
     else {
        echo "Aucun fichier reçu.";
    }

    insert_objet($id_membre, $id_categorie,$nom_objet);
    
}
function get_objets_par_id($id){
    $req = "select * from gestion_v_info_objet where id_objet=%d";
    $req = sprintf($req, $id);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
     return $reponse;
}
function get_date_dispo($id){
    $req = "select datediff(now(), date_retour) from gestion_emprunt where id_objet=%d";
    $req = sprintf($req, $id);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
     return $reponse['datediff(now(), date_retour)'];
}
function emprunter($id_obj, $nbj, $id_mbr) {
    $req = "insert into gestion_emprunt (id_objet,nom_image,id_membre,date_emprunt) values (%d,null,%d,now(),date_add(now(), interval %d day))";
    $req = sprintf($req,$id_obj,$id_mbr,$nbj);
    $envoi = mysqli_query(dbconnect(),$req);
}
function get_emprunts($id_membre){
    $req = "select * from gestion_emprunt where id_membre=%d";
    $req = sprintf($req,$id_membre);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
function insert_etat($id_objet,$etat)
{
     $info_emprunts= get_info_emprunt($id_objet);
     foreach($info_emprunts as $info){
        $req = "insert into gestion_etat_objet(id_objet,id_emprunt,etat) values (%d,%d,'%s')";
        $req = sprintf($req,$id_objet,$info['id_emprunt'],$etat);
        $envoi = mysqli_query(dbconnect(),$req);
    }
     }
function get_tout(){
    $req = "select * from gestion_etat_objet";
    $req = sprintf($req,$id_membre);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
     return $tab;
}
function get_isa(){
    $req = "select * from gestion_etat_objet";
    $req = sprintf($req,$id_membre);
    $envoi = mysqli_query(dbconnect(),$req);
    $tab =[];
    while(  $reponse =mysqli_fetch_assoc($envoi)){
        $tab[] =$reponse; 
    }
    $i = 0;
    $j=0;
    foreach($tab as $t){
        if($t['etat']=="Bon"){
                $i++;
        }
    }
    if($t['etat']=="Mauvais"){
        $j++;
    }
    $tableau[0] = $i;
    $tableau[1] = $j;
     return $tableau;
}
    // id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
//     id_objet INT,
//     id_membre INT,
//     date_emprunt DATE,
//     date_retour DATE,
?>
