-- 1. Création de la base de données (facultatif selon votre SGBD)
drop database gestion_emprunt;
CREATE DATABASE IF NOT EXISTS gestion_emprunt;
USE gestion_emprunt;

-- 2. Table gestion_membre
CREATE TABLE gestion_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre ENUM('H', 'F'),
    email VARCHAR(150),
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

-- 3. Table gestion_categorie_objet
CREATE TABLE gestion_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

-- 4. Table gestion_objet
CREATE TABLE gestion_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES gestion_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES gestion_membre(id_membre)
);

-- 5. Table gestion_images_objet
CREATE TABLE gestion_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES gestion_objet(id_objet)
);

-- 6. Table gestion_emprunt
CREATE TABLE gestion_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES gestion_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES gestion_membre(id_membre)
);

-- 7. Insertion de 4 membres
INSERT INTO gestion_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice', '1990-01-01', 'F', 'alice@mail.com', 'Paris', 'pass123', 'alice.jpg'),
('Bob', '1985-05-12', 'H', 'bob@mail.com', 'Lyon', 'pass456', 'bob.jpg'),
('Claire', '1992-09-20', 'F', 'claire@mail.com', 'Marseille', 'pass789', 'claire.jpg'),
('David', '1988-12-02', 'H', 'david@mail.com', 'Toulouse', 'pass321', 'david.jpg');

-- 8. Insertion de 4 catégories
INSERT INTO gestion_categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');

-- 9. Insertion de 10 objets par membre (40 objets au total)
INSERT INTO gestion_objet (nom_objet, id_categorie, id_membre) VALUES
-- Objets d'Alice (id_membre = 1)
('Sèche-cheveux', 1, 1),
('Tondeuse visage', 1, 1),
('Pinceau maquillage', 1, 1),
('Tournevis', 2, 1),
('Perceuse', 2, 1),
('Scie manuelle', 2, 1),
('Crics voiture', 3, 1),
('Pompe à air', 3, 1),
('Fouet cuisine', 4, 1),
('Mixeur', 4, 1),

-- Objets de Bob (id_membre = 2)
('Rasoir électrique', 1, 2),
('Fer à lisser', 1, 2),
('Niveau à bulle', 2, 2),
('Marteau', 2, 2),
('Clé anglaise', 2, 2),
('Cric hydraulique', 3, 2),
('Clé dynamométrique', 3, 2),
('Spatule', 4, 2),
('Batteur électrique', 4, 2),
('Moulin à café', 4, 2),

-- Objets de Claire (id_membre = 3)
('Poudre libre', 1, 3),
('Miroir de poche', 1, 3),
('Scie sauteuse', 2, 3),
('Tournevis électrique', 2, 3),
('Compresseur', 3, 3),
('Extracteur de boulons', 3, 3),
('Robot pâtissier', 4, 3),
('Casserole', 4, 3),
('Poêle', 4, 3),
('Moule silicone', 4, 3),

-- Objets de David (id_membre = 4)
('Gel cheveux', 1, 4),
('Peigne', 1, 4),
('Pistolet à colle', 2, 4),
('Scie circulaire', 2, 4),
('Crémaillère', 3, 4),
('Cric électrique', 3, 4),
('Couteau chef', 4, 4),
('Planche à découper', 4, 4),
('Mixeur plongeant', 4, 4),
('Brosse à barbe', 1, 4);

-- 10. Insertion des images d’objets (1 par objet pour simplifier)
-- INSERT INTO gestion_images_objet (id_objet, nom_image)
-- SELECT id_objet, CONCAT('image_objet_', id_objet, '.jpg') FROM objet;

-- 11. Insertion de 10 emprunts
INSERT INTO gestion_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-12'),
(10, 4, '2025-07-03', '2025-07-13'),
(12, 1, '2025-07-04', '2025-07-14'),
(17, 3, '2025-07-05', '2025-07-15'),
(23, 1, '2025-07-06', '2025-07-16'),
(29, 2, '2025-07-07', '2025-07-17'),
(32, 1, '2025-07-08', '2025-07-18'),
(37, 3, '2025-07-09', '2025-07-19'),
(40, 2, '2025-07-10', '2025-07-20');

