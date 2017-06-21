-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 13:54
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mapetiteepicerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorie` varchar(45) NOT NULL,
  `photo_cat` varchar(45) DEFAULT NULL,
  `produits_categorie` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`categorie`, `photo_cat`, `produits_categorie`) VALUES
('Boissons', NULL, 'Boissons'),
('Entretien', NULL, 'Entretien'),
('Epicerie salée', NULL, 'Epicerie salée'),
('Epicerie sucrée', NULL, 'Epicerie sucrée'),
('Fruits et légumes', NULL, 'Fruits et légumes'),
('Hygiène', NULL, 'Hygiène'),
('Plat du jour', NULL, 'Plat du jour'),
('Produits frais', NULL, 'Produits frais');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `ID_cde` int(11) NOT NULL,
  `date_com` date NOT NULL,
  `date_livr` date DEFAULT NULL,
  `heure_livr` time DEFAULT NULL,
  `points_fidelite` int(11) DEFAULT NULL,
  `id_util` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commercant`
--

CREATE TABLE `commercant` (
  `ID_commercant` int(11) NOT NULL,
  `textes_annonce` mediumtext,
  `textes_email` mediumtext,
  `id_util` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_util` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `droits_acces` int(11) NOT NULL,
  `token` varchar(45) DEFAULT NULL,
  `date_token` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id_util`, `email`, `password`, `droits_acces`, `token`, `date_token`) VALUES
(1, 'aa@aa.fr', 'aa', 99, NULL, NULL),
(2, 'bb@bb.fr', 'bb', 99, NULL, NULL),
(3, 'cc@cc.fr', 'cc', 99, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `ID_panier` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantité` int(11) NOT NULL,
  `commentaire` longtext,
  `id_util` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`ID_panier`, `prix`, `quantité`, `commentaire`, `id_util`, `id_prod`) VALUES
(1, '4', 2, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID_prod` int(11) NOT NULL,
  `descriptif` longtext,
  `poids_volume` varchar(45) DEFAULT NULL,
  `unites` varchar(45) DEFAULT NULL,
  `marque` varchar(45) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `prix_old` decimal(10,2) DEFAULT NULL,
  `photo1` varchar(45) DEFAULT NULL,
  `statut` varchar(20) DEFAULT 'Normal',
  `nouveau` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ID_prod`, `descriptif`, `poids_volume`, `unites`, `marque`, `prix`, `prix_old`, `photo1`, `statut`, `nouveau`) VALUES
(1, 'Boite de petits pois', '250', 'g', 'cassegrain', '2.00', NULL, NULL, NULL, NULL),
(3, 'Paquet de spaghettis', '500', 'g', 'panzani', '2.00', NULL, NULL, NULL, NULL),
(5, 'Crackers apéritif', '100', 'g', 'Belin', '3.00', NULL, NULL, NULL, NULL),
(9, 'essai', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(10, 'essai2', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(11, 'essai3', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(12, 'essai4', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(13, 'essai7', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(14, 'erssai8', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(15, 'essai9', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(16, 'essss11', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(17, 'essai122', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(18, 'essas55', NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL),
(19, 'Café lyophilisé spécial filtre', '250', 'g', 'Nescafé', '4.20', NULL, 'img/Nescafe_filtre.png', 'Normal', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_util` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse1` varchar(45) NOT NULL,
  `adresse2` varchar(45) DEFAULT NULL,
  `CP` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `heure pref` time DEFAULT NULL,
  `points_fid` int(11) DEFAULT '0',
  `date_points_fid` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_util`, `nom`, `prenom`, `adresse1`, `adresse2`, `CP`, `ville`, `tel`, `mobile`, `heure pref`, `points_fid`, `date_points_fid`) VALUES
(1, 'aa', 'aa', 'aaaa', NULL, 11111, 'aaaaa', NULL, NULL, '18:30:00', 0, NULL),
(2, 'bb', 'bb', 'bbbb', NULL, 22222, 'bbbbb', NULL, NULL, NULL, 0, NULL),
(3, 'cc', 'cc', 'cccc', NULL, 33333, 'ccccc', NULL, NULL, NULL, 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie`,`produits_categorie`),
  ADD KEY `fk_categories_produits1_idx` (`produits_categorie`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`ID_cde`,`id_util`,`id_panier`),
  ADD KEY `fk_commandes_utilisateurs_idx` (`id_util`),
  ADD KEY `fk_commandes_panier1_idx` (`id_panier`);

--
-- Index pour la table `commercant`
--
ALTER TABLE `commercant`
  ADD PRIMARY KEY (`ID_commercant`,`id_util`),
  ADD KEY `fk_commercant_login1_idx` (`id_util`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_util`),
  ADD KEY `fk_login_utilisateurs1_idx` (`id_util`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ID_panier`,`id_util`,`id_prod`),
  ADD KEY `fk_panier_utilisateurs1_idx` (`id_util`),
  ADD KEY `fk_panier_produits1_idx` (`id_prod`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID_prod`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_util`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `ID_cde` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commercant`
--
ALTER TABLE `commercant`
  MODIFY `ID_commercant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `ID_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_panier1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`ID_panier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commercant`
--
ALTER TABLE `commercant`
  ADD CONSTRAINT `fk_commercant_login1` FOREIGN KEY (`id_util`) REFERENCES `login` (`id_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_utilisateurs1` FOREIGN KEY (`id_util`) REFERENCES `utilisateurs` (`ID_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produits1` FOREIGN KEY (`id_prod`) REFERENCES `produits` (`ID_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_panier_utilisateurs1` FOREIGN KEY (`id_util`) REFERENCES `utilisateurs` (`ID_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
