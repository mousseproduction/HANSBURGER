-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Décembre 2017 à 16:23
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hansburger`
--
CREATE DATABASE IF NOT EXISTS `hansburger` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hansburger`;

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) UNSIGNED NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `illustration_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `action`:
--   `illustration_id`
--       `illustration` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte_modele`
--

DROP TABLE IF EXISTS `carte_modele`;
CREATE TABLE `carte_modele` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `pv` int(2) DEFAULT NULL,
  `degat` int(2) NOT NULL,
  `prix` int(2) NOT NULL,
  `hero_modele_id` int(11) UNSIGNED NOT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `illustration_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `carte_modele`:
--   `hero_modele_id`
--       `heros_modele` -> `id`
--   `illustration_id`
--       `illustration` -> `id`
--   `type_id`
--       `type` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte_partie`
--

DROP TABLE IF EXISTS `carte_partie`;
CREATE TABLE `carte_partie` (
  `id` int(11) UNSIGNED NOT NULL,
  `pv` int(2) DEFAULT NULL,
  `degat` int(2) NOT NULL,
  `prix` int(2) NOT NULL,
  `carte_modele_id` int(11) UNSIGNED NOT NULL,
  `hero_partie_id` int(11) UNSIGNED NOT NULL,
  `statut_id` int(11) UNSIGNED NOT NULL,
  `type_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `carte_partie`:
--   `carte_modele_id`
--       `carte_modele` -> `id`
--   `hero_partie_id`
--       `heros_partie` -> `id`
--   `statut_id`
--       `statut` -> `id`
--   `type_id`
--       `type` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `id` int(11) UNSIGNED NOT NULL,
  `partie_id` int(11) UNSIGNED NOT NULL,
  `action_id` int(11) UNSIGNED NOT NULL,
  `carte1_partie_id` int(11) UNSIGNED NOT NULL,
  `carte2_partie_id` int(11) UNSIGNED DEFAULT NULL,
  `hero_partie_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `evenement`:
--   `action_id`
--       `action` -> `id`
--   `carte1_partie_id`
--       `carte_partie` -> `id`
--   `carte2_partie_id`
--       `carte_partie` -> `id`
--   `hero_partie_id`
--       `heros_partie` -> `id`
--   `partie_id`
--       `partie` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `heros_modele`
--

DROP TABLE IF EXISTS `heros_modele`;
CREATE TABLE `heros_modele` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `statut` varchar(25) DEFAULT NULL,
  `pv` int(2) DEFAULT NULL,
  `cagnotte` int(2) DEFAULT NULL,
  `illustration_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `heros_modele`:
--   `illustration_id`
--       `illustration` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `heros_partie`
--

DROP TABLE IF EXISTS `heros_partie`;
CREATE TABLE `heros_partie` (
  `id` int(11) UNSIGNED NOT NULL,
  `statut` varchar(25) DEFAULT NULL,
  `pv` int(2) DEFAULT NULL,
  `cagnotte` int(2) DEFAULT NULL,
  `joueur_id` int(11) UNSIGNED NOT NULL,
  `hero_modele_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `heros_partie`:
--   `hero_modele_id`
--       `heros_modele` -> `id`
--   `joueur_id`
--       `joueur` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `illustration`
--

DROP TABLE IF EXISTS `illustration`;
CREATE TABLE `illustration` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `illustration`:
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE `joueur` (
  `id` int(11) UNSIGNED NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `naissance` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(45) NOT NULL,
  `ratio_vd` int(3) DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `code_postal` int(5) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `en_ligne` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `joueur`:
--

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE `partie` (
  `id` int(11) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `cpt_tour` int(11) UNSIGNED NOT NULL,
  `partie_terminee` int(2) NOT NULL,
  `hero1_partie_id` int(11) UNSIGNED NOT NULL,
  `hero2_partie_id` int(11) UNSIGNED DEFAULT NULL,
  `plateau_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `partie`:
--   `hero1_partie_id`
--       `heros_partie` -> `id`
--   `hero2_partie_id`
--       `heros_partie` -> `id`
--   `plateau_id`
--       `plateau` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `plateau`
--

DROP TABLE IF EXISTS `plateau`;
CREATE TABLE `plateau` (
  `id` int(11) UNSIGNED NOT NULL,
  `illustration_id` int(11) UNSIGNED NOT NULL,
  `hero_modele1_id` int(11) UNSIGNED NOT NULL,
  `hero_modele2_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `plateau`:
--   `hero_modele1_id`
--       `heros_modele` -> `id`
--   `hero_modele2_id`
--       `heros_modele` -> `id`
--   `illustration_id`
--       `illustration` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE `statut` (
  `id` int(11) UNSIGNED NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `statut`:
--

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) UNSIGNED NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `type`:
--

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_action_illustration1_idx` (`illustration_id`);

--
-- Index pour la table `carte_modele`
--
ALTER TABLE `carte_modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carte_modele_hero_modele_idx` (`hero_modele_id`),
  ADD KEY `fk_carte_modele_type1_idx` (`type_id`),
  ADD KEY `fk_carte_modele_illustration1_idx` (`illustration_id`);

--
-- Index pour la table `carte_partie`
--
ALTER TABLE `carte_partie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carte_partie_carte_modele1_idx` (`carte_modele_id`),
  ADD KEY `fk_carte_partie_statut1_idx` (`statut_id`),
  ADD KEY `fk_carte_partie_type1_idx` (`type_id`),
  ADD KEY `fk_carte_partie_hero_partie1_idx` (`hero_partie_id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evenement_partie1_idx` (`partie_id`),
  ADD KEY `fk_evenement_action1_idx` (`action_id`),
  ADD KEY `fk_evenement_carte_partie1_idx` (`carte1_partie_id`),
  ADD KEY `fk_evenement_carte_partie2_idx` (`carte2_partie_id`),
  ADD KEY `fk_evenement_hero_partie1_idx` (`hero_partie_id`);

--
-- Index pour la table `heros_modele`
--
ALTER TABLE `heros_modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hero_modele_illustration1_idx` (`illustration_id`);

--
-- Index pour la table `heros_partie`
--
ALTER TABLE `heros_partie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hero_partie_hero_modele1_idx` (`hero_modele_id`),
  ADD KEY `fk_hero_partie_joueur1_idx` (`joueur_id`);

--
-- Index pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo_UNIQUE` (`pseudo`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_partie_hero_partie1_idx` (`hero1_partie_id`),
  ADD KEY `fk_partie_hero_partie2_idx` (`hero2_partie_id`),
  ADD KEY `fk_partie_plateau1_idx` (`plateau_id`);

--
-- Index pour la table `plateau`
--
ALTER TABLE `plateau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plateau_illustration1_idx` (`illustration_id`),
  ADD KEY `fk_plateau_hero_modele1_idx` (`hero_modele1_id`),
  ADD KEY `fk_plateau_hero_modele2_idx` (`hero_modele2_id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `fk_action_illustration1` FOREIGN KEY (`illustration_id`) REFERENCES `illustration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `carte_modele`
--
ALTER TABLE `carte_modele`
  ADD CONSTRAINT `fk_carte_modele_hero_modele` FOREIGN KEY (`hero_modele_id`) REFERENCES `heros_modele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carte_modele_illustration1` FOREIGN KEY (`illustration_id`) REFERENCES `illustration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carte_modele_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `carte_partie`
--
ALTER TABLE `carte_partie`
  ADD CONSTRAINT `fk_carte_partie_carte_modele1` FOREIGN KEY (`carte_modele_id`) REFERENCES `carte_modele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carte_partie_hero_partie1` FOREIGN KEY (`hero_partie_id`) REFERENCES `heros_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carte_partie_statut1` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carte_partie_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_evenement_action1` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_carte_partie1` FOREIGN KEY (`carte1_partie_id`) REFERENCES `carte_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_carte_partie2` FOREIGN KEY (`carte2_partie_id`) REFERENCES `carte_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_hero_partie1` FOREIGN KEY (`hero_partie_id`) REFERENCES `heros_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_partie1` FOREIGN KEY (`partie_id`) REFERENCES `partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `heros_modele`
--
ALTER TABLE `heros_modele`
  ADD CONSTRAINT `fk_hero_modele_illustration1` FOREIGN KEY (`illustration_id`) REFERENCES `illustration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `heros_partie`
--
ALTER TABLE `heros_partie`
  ADD CONSTRAINT `fk_hero_partie_hero_modele1` FOREIGN KEY (`hero_modele_id`) REFERENCES `heros_modele` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hero_partie_joueur1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_hero_partie1` FOREIGN KEY (`hero1_partie_id`) REFERENCES `heros_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partie_hero_partie2` FOREIGN KEY (`hero2_partie_id`) REFERENCES `heros_partie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partie_plateau1` FOREIGN KEY (`plateau_id`) REFERENCES `plateau` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `plateau`
--
ALTER TABLE `plateau`
  ADD CONSTRAINT `fk_plateau_hero_modele1` FOREIGN KEY (`hero_modele1_id`) REFERENCES `heros_modele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plateau_hero_modele2` FOREIGN KEY (`hero_modele2_id`) REFERENCES `heros_modele` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plateau_illustration1` FOREIGN KEY (`illustration_id`) REFERENCES `illustration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
