create database emprunt;
use emprunt;

CREATE TABLE emprunt_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    genre ENUM('H', 'F') NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    ville VARCHAR(100) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    image_profil VARCHAR(255)
);
CREATE TABLE emprunt_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE emprunt_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100) NOT NULL,
    id_categorie INT NOT NULL,
    id_membre INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES emprunt_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
);
CREATE TABLE emprunt_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    nom_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet) ON DELETE CASCADE
);
CREATE TABLE emprunt_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    id_membre INT NOT NULL,
    date_emprunt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    date_retour DATETIME,
    FOREIGN KEY (id_objet) REFERENCES emprunt_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES emprunt_membre(id_membre)
);

INSERT INTO emprunt_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Jean Dupont', '1985-03-15', 'Homme', 'jean.dupont@email.com', 'Paris', 'motdepasse123', 'jean.jpg'),
('Marie Martin', '1990-07-22', 'Femme', 'marie.martin@email.com', 'Lyon', 'password456', 'marie.jpg'),
('Pierre Lambert', '1982-11-30', 'Homme', 'pierre.lambert@email.com', 'Marseille', 'secret789', 'pierre.jpg'),
('Sophie Bernard', '1995-05-18', 'Femme', 'sophie.bernard@email.com', 'Bordeaux', 'sophie123', 'sophie.jpg');

INSERT INTO emprunt_categorie_objet (nom_categorie) VALUES
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Perceuse visseuse', 2, 1),
('Robot mixeur', 4, 1),
('Tondeuse a gazon', 2, 1),
('Valise a outils', 2, 1),
('Seche-cheveux professionnel', 1, 1),
('Plaque a induction', 4, 1),
('Cric hydraulique', 3, 1),
('Fer a lisser', 1, 1),
('Machine a coudre', 2, 1),
('Ponceuse orbitale', 2, 1);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre, description) VALUES
('Machine a raclette', 4, 2),
('Pistolet a peinture', 2, 2),
('Appareil a fondue', 4, 2),
('Lisseur a vapeur', 1, 2),
('Pese-personne connecte', 1, 2),
('Scie sauteuse', 2, 2),
('Balance de cuisine', 4, 2),
('Trousse de maquillage', 1, 2),
('Pompe a velo', 3, 2),
('Marteau piqueur', 2, 2);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre, description) VALUES
('Demarreur de voiture', 3, 3),
('Barbecue electrique', 4, 3),
('Ponceuse a bande', 2, 3),
('Trousse de toilette', 1, 3),
('Machine a pain', 4, 3),
('Nettoyeur haute pression', 2, 3),
('epilateur electrique', 1, 3),
('Verin mecanique', 3, 3),
('Friteuse sans huile', 4, 3),
('Tournevis dynamometrique', 3, 3);

INSERT INTO emprunt_objet (nom_objet, id_categorie, id_membre) VALUES
('Autocuiseur electrique', 4, 4),
('Pulverisateur de peinture', 2, 4),
('Appareil a smoothie', 4, 4),
('Lampe a ongles UV', 1, 4),
('Scie circulaire', 2, 4),
('Balance de precision', 4, 4),
('Taille-haie electrique', 2, 4),
('Masque de beaute', 1, 4),
('Valise de diagnostic auto', 3, 4),
('Extracteur de jus', 4, 4);

INSERT INTO emprunt_images_objet (id_objet, nom_image) VALUES
(1, 'perceuse1.jpg'),
(1, 'perceuse2.jpg'),
(5, 'seche_cheveux.jpg'),
(12, 'raclette.jpg'),
(18, 'maquillage.jpg'),
(25, 'autocuiseur.jpg'),
(30, 'extracteur.jpg'),
(22, 'epilateur.jpg'),
(15, 'pese_personne.jpg'),
(8, 'fer_lisser.jpg');

