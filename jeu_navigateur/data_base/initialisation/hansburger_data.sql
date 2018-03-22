-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 22 Mars 2018 à 21:43
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.25-0ubuntu0.16.04.1

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
-- Contenu de la table `action`
--

INSERT INTO `action` (`id`, `libelle`, `illustration_id`) VALUES
(1, 'Piocher', 1),
(2, 'Invoquer', 1),
(3, 'Attaquer', 1),
(4, 'Passer', 1);

--
-- Contenu de la table `carte_collection`
--

INSERT INTO `carte_collection` (`id`, `nom`, `pv`, `degat`, `prix`, `heros_collection_id`, `type_id`, `illustration_id`, `description`) VALUES
(1, 'Supermad', 9, 9, 9, 1, 1, 1, 'Le son de sa guitare vous électrisent.'),
(2, 'Interstellarsen', 0, 4, 3, 1, 3, 1, 'Il vient de l\'espace pour aspirer votre âme avec le son strident de son arme.'),
(3, 'DJ Da funky Code', 2, 3, 2, 1, 1, 1, 'Ne vous méprenez pas de son sourire, sa musique vous poursuivra jusqu\'au prochain tour.'),
(4, 'Jack pipow', 0, 6, 5, 1, 3, 1, 'Hypnotisé vous serez !'),
(5, 'Pinguin\'s united', 3, 1, 1, 1, 2, 1, 'L\'harmonie de leurs voix  écarte toute menaces contre moi.'),
(6, 'Spidermaid', 6, 3, 3, 1, 2, 1, 'On se fait une toile ?'),
(7, 'Simbale', 1, 2, 1, 1, 1, 1, 'Il donne le LA !'),
(8, 'Prinception', 0, 1, 1, 1, 3, 1, 'En chantant il vient doucement prendre possession de votre esprit.'),
(9, 'Gong fu panda', 4, 2, 4, 1, 1, 1, 'Le gong retentira, des ondes il projettera, à terre il vous mettra...'),
(10, 'Hannibal lecteur', 3, 5, 3, 1, 1, 1, 'Sa musique vous hypnotisera, pendant qu\'il vous démembrera. '),
(11, 'Badman', 5, 7, 5, 1, 1, 6, 'Son Moon Walk est légendaire. '),
(12, 'Glad_batteur', 6, 8, 7, 1, 1, 1, 'Il bat les tambours de guerre.'),
(13, 'Maitre Soda', 9, 9, 9, 2, 1, 1, 'Le sucre redouter tu dois !'),
(14, 'Don Pepperoni', 6, 8, 7, 2, 1, 1, 'Ma si tou t\'en prend à ma famille ! Tou va finir en rondelles !'),
(15, 'Enfants agites', 0, 2, 1, 2, 3, 1, 'Ils sont totalement insupportables !'),
(16, 'Sol glissant', 0, 5, 3, 2, 3, 1, 'Pas évident de tenir bon !'),
(17, 'Intoxication alimentaire', 0, 7, 5, 2, 3, 1, 'Vous êtes bon pour rester couché.'),
(18, 'Menu XXL', 3, 1, 1, 2, 2, 1, 'Vous allez avoir beaucoup de mal à le finir !'),
(19, 'File d\'attente', 6, 3, 3, 2, 2, 1, 'A partir d\'ici, 1 heure d\'attente !'),
(20, 'Ke-babacool', 1, 1, 1, 2, 1, 1, 'Je suis affectueux et indigeste. PEACE'),
(21, 'Skate-chup\'', 3, 2, 2, 2, 1, 1, 'Jamais à court de sauce !'),
(22, 'Do-nut-eat', 3, 4, 3, 2, 1, 1, 'Le sucre, c\'est la vie. Ou pas. '),
(23, 'Miss Meuf in', 4, 2, 4, 2, 1, 1, 'Je suis à croquer, dur de résister...'),
(24, 'Tahin Sushi', 5, 6, 5, 2, 1, 1, 'Je vais te tailler en sashimi.');

--
-- Contenu de la table `heros_collection`
--

INSERT INTO `heros_collection` (`id`, `nom`, `statut`, `pv`, `cagnotte`, `illustration_id`) VALUES
(1, 'Hans Zimmer', '', 20, 0, 1),
(2, 'Fast Food', '', 20, 0, 1);

--
-- Contenu de la table `illustration`
--

INSERT INTO `illustration` (`id`, `path`) VALUES
(1, 'burger'),
(3, 'rrrrrrr'),
(4, 'louteche'),
(5, 'longin'),
(6, 'batman'),
(7, 'don_pepperoni.jpg'),
(8, 'do-nut-eat.jpg'),
(9, 'enfants_agites.jpg'),
(10, 'file_d_attente.jpg'),
(11, 'intoxication_alimentaire.jpg'),
(12, 'kebabacool.jpg'),
(13, 'maitre_soda.jpg'),
(14, 'menu_xxl.jpg'),
(15, 'miss_meuf_in.jpg'),
(16, 'skate_chup.jpg'),
(17, 'sol_glissant.jpg'),
(18, 'tahin_sushi.jpg'),
(19, 'badman.jpg'),
(20, 'pj_da_funky_code.jpg'),
(21, 'gladbatteur.jpg'),
(22, 'gong_fu_panda.jpg'),
(23, 'hannibal_lecteur.jpg'),
(24, 'interstellarsen.jpg'),
(25, 'jack_pipow.jpg'),
(26, 'pinguins_united.jpg'),
(27, 'prinception.jpg'),
(28, 'simbale.jpg'),
(29, 'spidermaid.jpg'),
(30, 'supermap.jpg');

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id`, `pseudo`, `prenom`, `nom`, `naissance`, `email`, `mot_de_passe`, `ratio_vd`, `adresse`, `code_postal`, `ville`, `telephone`, `en_ligne`) VALUES
(1, 'pilou', 'pilou', 'pilou', '2017-12-04', '', 'pilou', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'poilu', 'poilu', 'poilu', '2017-12-12', 'poilu', 'poilu', 1, NULL, NULL, NULL, NULL, NULL);

--
-- Contenu de la table `plateau`
--

INSERT INTO `plateau` (`id`, `illustration_id`, `heros_collection1_id`, `heros_collection2_id`) VALUES
(1, 1, 2, 1);

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`) VALUES
(1, 'Deck'),
(2, 'Main'),
(3, 'Attente'),
(4, 'Combat'),
(5, 'Cimetière');

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `libelle`) VALUES
(1, 'Créature'),
(2, 'Bouclier'),
(3, 'Sort');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
