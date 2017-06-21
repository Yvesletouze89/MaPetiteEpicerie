-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 12 Juin 2017 à 12:23
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `mapetiteepicerie`
--
CREATE DATABASE IF NOT EXISTS `mapetiteepicerie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mapetiteepicerie`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID_cat` int(11) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `photo_cat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'jack@sparow.fr', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 0, NULL, NULL);

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
  `prix` decimal(10,0) NOT NULL,
  `photo1` varchar(45) DEFAULT NULL,
  `photo2` varchar(45) DEFAULT NULL,
  `attente` tinyint(4) DEFAULT NULL,
  `promo` tinyint(4) DEFAULT NULL,
  `nouveau` tinyint(4) DEFAULT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `heure_pref` time DEFAULT NULL,
  `points_fid` int(11) DEFAULT '0',
  `date_points_fid` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_util`, `nom`, `prenom`, `adresse1`, `adresse2`, `CP`, `ville`, `tel`, `mobile`, `heure_pref`, `points_fid`, `date_points_fid`) VALUES
(1, 'sparow', 'jack', '', NULL, 0, '', NULL, NULL, NULL, 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_cat`);

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
  ADD PRIMARY KEY (`ID_prod`,`id_cat`),
  ADD KEY `fk_produits_categories1_idx` (`id_cat`);

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
  MODIFY `ID_cat` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID_panier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID_prod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_produits_categories1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`ID_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION;
