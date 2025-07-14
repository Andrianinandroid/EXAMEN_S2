create or replace view gestion_v_info_objet 
as 
select m.nom,o.nom_objet,c.nom_categorie from gestion_membre m
join gestion_objet o on m.id_membre = o.id_membre 
join gestion_categorie_objet c on c.id_categorie = o.id_categorie;