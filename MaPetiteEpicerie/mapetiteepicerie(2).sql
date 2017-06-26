-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Juin 2017 à 17:06
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
  `ID_cat` int(11) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `photo_cat` varchar(45) DEFAULT NULL,
  `essai` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`ID_cat`, `categorie`, `photo_cat`, `essai`) VALUES
(1, 'Boissons', NULL, NULL),
(2, 'Entretien', NULL, NULL),
(3, 'Epicerie salée', NULL, NULL),
(4, 'Epicerie sucrée', NULL, NULL),
(5, 'Fruits et légumes', NULL, NULL),
(6, 'Hygiène', NULL, NULL),
(7, 'Plat du jour', NULL, NULL),
(8, 'Produits frais', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `ID_cde` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `utilisateurs_ID_util` int(11) NOT NULL,
  `date_com` date NOT NULL,
  `date_livr` date DEFAULT NULL,
  `heure_livr` time DEFAULT NULL,
  `points_fidelite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandes_has_produits`
--

CREATE TABLE `commandes_has_produits` (
  `commandes_ID_cde` int(11) NOT NULL,
  `commandes_id_util` int(11) NOT NULL,
  `produits_ID_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commercant`
--

CREATE TABLE `commercant` (
  `ID_commercant` int(11) NOT NULL,
  `nom_commercial` varchar(100) NOT NULL,
  `siret` varchar(45) DEFAULT NULL,
  `utilisateurs_ID_util` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commercant`
--

INSERT INTO `commercant` (`ID_commercant`, `nom_commercial`, `siret`, `utilisateurs_ID_util`) VALUES
(1, 'aa', 'aa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID_prod` int(11) NOT NULL,
  `categories_categorie` varchar(45) NOT NULL,
  `descriptif` longtext,
  `poids_volume` varchar(45) DEFAULT NULL,
  `unites` varchar(45) DEFAULT NULL,
  `marque` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `categorie` varchar(45) NOT NULL,
  `ingredients` longtext,
  `code_barre` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ID_prod`, `categories_categorie`, `descriptif`, `poids_volume`, `unites`, `marque`, `photo`, `categorie`, `ingredients`, `code_barre`) VALUES
(1, '', 'Boite de champignons de Paris à la crème', '250', 'g', 'Cassegrain', 'img/Cassegrain_ChampignonsdeParis.png', 'Fruits et légumes', NULL, NULL),
(3, '', 'Paquet de tagliatelles', '500', 'g', 'Panzani', 'img/Panzani_tagliatelles_500g.jpg', 'Epicerie salée', NULL, NULL),
(5, '', 'Chips nature', '500', 'g', 'Lays', 'img/Lays_chips.jpg', 'Epicerie salée', NULL, NULL),
(19, '', 'Café lyophilisé spécial filtre', '250', 'g', 'Nescafé', 'img/Nescafe_filtre.png', 'Boissons', NULL, NULL),
(20, '', 'Boîte de haricots verts extra-fins', '250', 'g', 'Cassegrain', 'img/Cassegrain_Haricotsverts.png', 'Fruits et légumes', NULL, NULL),
(21, '', 'Huile Isio4', '1', 'l', 'Lesieur', 'img/Lesieur_Huile-ISIO-4.png', 'Epicerie salée', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stock_produits`
--

CREATE TABLE `stock_produits` (
  `ID_stock` int(11) NOT NULL,
  `produits_ID_prod` int(11) NOT NULL,
  `utilisateurs_ID_util` int(11) NOT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `prix_old` decimal(10,2) DEFAULT NULL,
  `promo` varchar(15) DEFAULT 'NON',
  `nouveau` varchar(3) DEFAULT 'NON',
  `stock` int(11) DEFAULT '0',
  `prix/unité` decimal(10,2) DEFAULT NULL,
  `unite_base` varchar(10) DEFAULT NULL,
  `datevalid` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `stock_produits`
--

INSERT INTO `stock_produits` (`ID_stock`, `produits_ID_prod`, `utilisateurs_ID_util`, `prix`, `prix_old`, `promo`, `nouveau`, `stock`, `prix/unité`, `unite_base`, `datevalid`) VALUES
(10, 20, 1, '2.55', NULL, 'NON', 'NON', 2, NULL, NULL, NULL),
(11, 5, 1, '3.60', NULL, 'OUI', 'NON', 3, NULL, NULL, NULL),
(12, 21, 1, '4.85', NULL, 'NON', 'OUI', 5, NULL, NULL, NULL),
(17, 3, 1, NULL, NULL, 'OUI', 'OUI', 4, NULL, NULL, NULL),
(18, 19, 1, NULL, NULL, 'NON', 'NON', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_util` int(11) NOT NULL,
  `civilite` varchar(3) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `adresse1` varchar(45) NOT NULL,
  `adresse2` varchar(45) DEFAULT NULL,
  `CP` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `heure_pref` time DEFAULT NULL,
  `points_fid` int(11) DEFAULT '0',
  `date_points_fid` date DEFAULT NULL,
  `droits_acces` varchar(15) DEFAULT 'Utilisateur',
  `token` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_util`, `civilite`, `nom`, `prenom`, `email`, `password`, `adresse1`, `adresse2`, `CP`, `ville`, `tel`, `mobile`, `heure_pref`, `points_fid`, `date_points_fid`, `droits_acces`, `token`) VALUES
(1, 'M', 'aa', 'aa', 'aa@gmail.fr', 'aa', 'aaaa', NULL, 11111, 'aaaaa', NULL, NULL, '18:30:00', 0, NULL, NULL, NULL),
(2, 'Mme', 'bb', 'bb', '', NULL, 'bbbb', NULL, 22222, 'bbbbb', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(3, 'Mme', 'cc', 'cc', '', NULL, 'cccc', NULL, 33333, 'ccccc', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(4, 'M', 'Toto', 'Titi', 'toto@gmail.com', 'toto', '', NULL, 89000, 'AUXERRE', '0386411010', '0607050809', NULL, 0, NULL, 'Utilisateur', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_cat`),
  ADD UNIQUE KEY `categorie` (`categorie`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`ID_cde`,`id_util`,`utilisateurs_ID_util`),
  ADD KEY `fk_commandes_utilisateurs_idx` (`id_util`),
  ADD KEY `fk_commandes_utilisateurs1_idx` (`utilisateurs_ID_util`);

--
-- Index pour la table `commandes_has_produits`
--
ALTER TABLE `commandes_has_produits`
  ADD PRIMARY KEY (`commandes_ID_cde`,`commandes_id_util`,`produits_ID_prod`),
  ADD KEY `fk_commandes_has_produits_produits1_idx` (`produits_ID_prod`),
  ADD KEY `fk_commandes_has_produits_commandes1_idx` (`commandes_ID_cde`,`commandes_id_util`);

--
-- Index pour la table `commercant`
--
ALTER TABLE `commercant`
  ADD PRIMARY KEY (`ID_commercant`,`utilisateurs_ID_util`),
  ADD KEY `fk_commercant_utilisateurs1_idx` (`utilisateurs_ID_util`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID_prod`,`categories_categorie`),
  ADD KEY `fk_produits_categories1_idx` (`categories_categorie`);

--
-- Index pour la table `stock_produits`
--
ALTER TABLE `stock_produits`
  ADD PRIMARY KEY (`ID_stock`,`produits_ID_prod`,`utilisateurs_ID_util`),
  ADD KEY `fk_stock_produits_produits1_idx` (`produits_ID_prod`),
  ADD KEY `fk_stock_produits_utilisateurs1_idx` (`utilisateurs_ID_util`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_util`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `ID_cde` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commercant`
--
ALTER TABLE `commercant`
  MODIFY `ID_commercant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `stock_produits`
--
ALTER TABLE `stock_produits`
  MODIFY `ID_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_utilisateurs1` FOREIGN KEY (`utilisateurs_ID_util`) REFERENCES `utilisateurs` (`ID_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commandes_has_produits`
--
ALTER TABLE `commandes_has_produits`
  ADD CONSTRAINT `fk_commandes_has_produits_commandes1` FOREIGN KEY (`commandes_ID_cde`,`commandes_id_util`) REFERENCES `commandes` (`ID_cde`, `id_util`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commandes_has_produits_produits1` FOREIGN KEY (`produits_ID_prod`) REFERENCES `produits` (`ID_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commercant`
--
ALTER TABLE `commercant`
  ADD CONSTRAINT `fk_commercant_utilisateurs1` FOREIGN KEY (`utilisateurs_ID_util`) REFERENCES `utilisateurs` (`ID_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_categories1` FOREIGN KEY (`categories_categorie`) REFERENCES `categories` (`categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stock_produits`
--
ALTER TABLE `stock_produits`
  ADD CONSTRAINT `fk_stock_produits_produits1` FOREIGN KEY (`produits_ID_prod`) REFERENCES `produits` (`ID_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_produits_utilisateurs1` FOREIGN KEY (`utilisateurs_ID_util`) REFERENCES `utilisateurs` (`ID_util`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
