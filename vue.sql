create or replace view gestion_v_info_objet 
as 
select m.nom,o.nom_objet,c.nom_categorie,o.id_objet,c.id_categorie
from gestion_membre m
join gestion_objet o on m.id_membre = o.id_membre 
join gestion_categorie_objet c on c.id_categorie = o.id_categorie;


function get_objets_par_id($id){
    $req = "select * from gestion_v_info_objet where id_objet=%d";
    $req = sprintf($req, $id);
    $envoi = mysqli_query(dbconnect(),$req);
    $reponse =mysqli_fetch_assoc($envoi);
     return $reponse;
}