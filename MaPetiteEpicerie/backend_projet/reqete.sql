-- Création de la base

CREATE DATABASE boutique_wf3;

USE boutique_wf3;

-- Création des tables

CREATE TABLE utilisateur
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255) NULL,
    date_naissance DATE,
    pays VARCHAR(255),
    ville VARCHAR(255),
    code_postal VARCHAR(5),
    nombre_achat INT
);

CREATE TABLE produits
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(100),
	prix INT,
	categorie VARCHAR(100)
);

-- Insertion des données

INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Boisseau', 'Grégoire', 'gregoireb13@gmail.com', '1990-04-13', 'France', 'Nitry', '89310', 42);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Épluskacé', 'Jean', NULL, '1985-05-05', 'France', 'Auxerre', '89000', 12);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Obama', 'Barack', 'presidentofusa@gmail.com', '1961-08-04', 'USA', 'Washington DC', '55555', 5);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Polnareff', 'Michel', 'goodbyemarilou@gmail.com', '1944-07-03', 'Argentine', 'Buenos Aires', '66666', 46);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Eastwood', 'Clint', 'inspectorharry@gmail.com', '1930-05-31', 'USA', 'Hollywood', '12345', 52);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Griezmann', 'Antoine', 'futurballondordu71@gmail.com', '1991-03-21', 'Espagna', 'Madrid', '77777', 123);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Messi', 'Lionel', 'barca4ever@hotmail.com', '1987-06-24', 'Panama', 'Panama City', '98765', 6584);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Trump', 'Donald', 'letsbuildawall@msn.com', '1946-06-14', 'USA', 'New York City', '98765', 2);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Aimarre', 'Jean', NULL, '1989-12-25', 'France', 'Paris', '75000', 25);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Delafontaine', 'Jean', 'fables@vertigo.com', '1962-10-16', 'France', 'Paris', '75000', 0);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Généreux', 'Jean-Marc', 'etcajachete@msn.com', '1962-12-25', 'Canada', 'Montréal', '00000', 165);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Brown', 'Alphone', NULL, '1973-12-02', 'France', 'Le Havre', '76600', 4);
INSERT INTO utilisateur (nom, prenom, email, date_naissance, pays, ville, code_postal, nombre_achat) VALUES ('Delastarac', 'Jenifer', 'jenny-au-soleil@hotmail.fr', '1982-11-15', 'France', 'Nice', '06000', 45);

INSERT INTO produits (nom, prix, categorie) VALUES ('Nintendo Switch by WF3', 499, 'Jeux vidéo');
INSERT INTO produits (nom, prix, categorie) VALUES ('Lamborghini rouge avec un logo WF3', 450000, 'Voiture');
INSERT INTO produits (nom, prix, categorie) VALUES ('Drone pour faire de jolies photos', 250, 'High-tech');
INSERT INTO produits (nom, prix, categorie) VALUES ('Station spatiale internationale', 999999999, 'High-tech');
INSERT INTO produits (nom, prix, categorie) VALUES ('Clé USB 500Go sérigraphiée WF3', 320, 'Informatique');
INSERT INTO produits (nom, prix, categorie) VALUES ('Bonbons Haribo', 3, 'Nourriture');
INSERT INTO produits (nom, prix, categorie) VALUES ('2 chevaux', 4000, 'Voiture');
INSERT INTO produits (nom, prix, categorie) VALUES ('Ordinateur Compaq remis à neuf', 220, 'Informatique');
INSERT INTO produits (nom, prix, categorie) VALUES ('Raspberry Pi sous RacalBox', 240, 'Informatique');
INSERT INTO produits (nom, prix, categorie) VALUES ('Pâtes Panzani', 1, 'Nourriture');
INSERT INTO produits (nom, prix, categorie) VALUES ('T-Shirt WF3', 20, 'Habillement');
INSERT INTO produits (nom, prix, categorie) VALUES ('Chaussures blanches et bleues', 40, 'Habillement');
INSERT INTO produits (nom, prix, categorie) VALUES ('Montre connectée WF3', 60, 'Informatique');
INSERT INTO produits (nom, prix, categorie) VALUES ('Batterie externe WF3 rouge', 60, 'High-tech');