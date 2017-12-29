-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Décembre 2017 à 14:32
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

--
-- Contenu de la table `illustration`
--

INSERT INTO `illustration` VALUES
(1, 'url');

--
-- Contenu de la table `action`
--

INSERT INTO `action` VALUES
(1, 'Piocher', 1),
(2, 'Invoquer', 1),
(3, 'Attaquer', 1),
(4, 'Passer', 1);

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` VALUES
(1, 'Deck'),
(2, 'Main'),
(3, 'Attente'),
(4, 'Combat'),
(5, 'Cimetière');

--
-- Contenu de la table `type`
--

INSERT INTO `type` VALUES
(1, 'Créature'),
(2, 'Bouclier'),
(3, 'Sort');

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` VALUES
(1, 'pilou', 'pilou', 'pilou', '2017-12-04', '', 'pilou', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'poilu', 'poilu', 'poilu', '2017-12-12', 'poilu', 'poilu', 1, NULL, NULL, NULL, NULL, NULL);

--
-- Contenu de la table `heros_modele`
--

INSERT INTO `heros_modele` VALUES
(1, 'Hans Zimmer', '', 20, 0, 1),
(2, 'Fast Food', '', 20, 0, 1);

--
-- Contenu de la table `plateau`
--

INSERT INTO `plateau` VALUES
(1, 1, 2, 1);

--
-- Contenu de la table `heros_partie`
--

INSERT INTO `heros_partie` VALUES
(1, '', 20, 0, 1, 1),
(2, '', 20, 0, 2, 2);

--
-- Contenu de la table `carte_modele`
--

INSERT INTO `carte_modele` VALUES
(1, 'Supermad', 9, 9, 9, 1, 1, 1),
(2, 'Voisin relou', 0, 1, 1, 1, 3, 1),
(3, 'Séquence émotions', 0, 4, 3, 1, 3, 1),
(4, 'Jack pipow', 0, 6, 5, 1, 3, 1),
(5, 'Pinguin\'s united', 3, 1, 1, 1, 2, 1),
(6, 'Spidermaid', 6, 3, 3, 1, 2, 1),
(7, 'Simbale', 1, 2, 1, 1, 1, 1),
(8, 'a déterminer', 3, 2, 2, 1, 1, 1),
(9, 'Gong fu panda', 4, 2, 4, 1, 1, 1),
(10, 'Hannibal lecteur', 3, 5, 3, 1, 1, 1),
(11, 'Badman', 5, 7, 5, 1, 1, 1),
(12, 'Gladbatteur', 6, 8, 7, 1, 1, 1),
(13, 'Fan de fast food', 9, 9, 9, 2, 1, 1),
(14, 'Maître soda', 0, 2, 1, 2, 3, 1),
(15, 'Enfants agites', 0, 5, 3, 2, 3, 1),
(16, 'Sol glissant', 0, 7, 5, 2, 3, 1),
(17, 'Intoxication alimentaire', 3, 1, 1, 2, 2, 1),
(18, 'Menu XXL', 6, 3, 3, 2, 2, 1),
(19, 'File d\'attente', 1, 1, 1, 2, 1, 1),
(20, 'Ke-babacool', 3, 2, 2, 2, 1, 1),
(21, 'Skate-chup\'', 3, 4, 3, 2, 1, 1),
(22, 'Do-nut-eat', 4, 2, 4, 2, 1, 1),
(23, 'Miss Meuffin', 5, 6, 5, 2, 1, 1),
(24, 'Tahin Sushi ?', 6, 8, 7, 2, 1, 1);

--
-- Contenu de la table `carte_partie`
--

INSERT INTO `carte_partie` VALUES
(1, 9, 9, 9, 1, 1, 2, 1),
(2, 0, 1, 1, 2, 1, 1, 3),
(3, 0, 4, 3, 3, 1, 1, 3),
(4, 0, 6, 5, 4, 1, 1, 3),
(5, 0, 6, 5, 4, 1, 1, 3),
(6, 3, 1, 1, 5, 1, 1, 2),
(7, 3, 1, 1, 5, 1, 1, 2),
(8, 6, 3, 3, 6, 1, 1, 2),
(9, 6, 3, 3, 6, 1, 1, 2),
(10, 1, 2, 1, 7, 1, 1, 1),
(11, 1, 2, 1, 7, 1, 1, 1),
(12, 3, 2, 2, 8, 1, 1, 1),
(13, 3, 2, 2, 8, 1, 1, 1),
(14, 4, 2, 4, 9, 1, 1, 1),
(15, 4, 2, 4, 9, 1, 1, 1),
(16, 3, 5, 3, 10, 1, 1, 1),
(17, 3, 5, 3, 10, 1, 1, 1),
(18, 5, 7, 5, 11, 1, 1, 1),
(19, 5, 7, 5, 11, 1, 1, 1),
(20, 6, 8, 7, 12, 1, 1, 1),
(21, 6, 8, 7, 12, 1, 1, 1),
(22, 9, 9, 9, 13, 2, 1, 1),
(23, 0, 2, 1, 14, 2, 1, 3),
(24, 0, 5, 3, 15, 2, 1, 3),
(25, 0, 7, 5, 16, 2, 1, 3),
(26, 3, 1, 1, 17, 2, 1, 2),
(27, 3, 1, 1, 17, 2, 1, 2),
(28, 6, 3, 3, 18, 2, 1, 2),
(29, 6, 3, 3, 18, 2, 1, 2),
(30, 1, 1, 1, 19, 2, 1, 1),
(31, 1, 1, 1, 19, 2, 1, 1),
(32, 3, 2, 2, 20, 2, 1, 1),
(33, 3, 2, 2, 20, 2, 1, 1),
(34, 3, 4, 3, 21, 2, 1, 1),
(35, 3, 4, 3, 21, 2, 1, 1),
(36, 4, 2, 4, 22, 2, 1, 1),
(37, 4, 2, 4, 22, 2, 1, 1),
(38, 5, 6, 5, 23, 2, 1, 1),
(39, 5, 6, 5, 23, 2, 1, 1),
(40, 6, 8, 7, 24, 2, 1, 1),
(41, 6, 8, 7, 24, 2, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
