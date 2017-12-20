SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `hansburger` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hansburger`;

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `id_illustration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `action` (`id_action`, `libelle`, `id_illustration`) VALUES
(1, 'Piocher', 1),
(2, 'Invoquer', 1),
(3, 'Attaquer', 1),
(4, 'Passer', 1);

CREATE TABLE `carte_modele` (
  `id_carte_modele` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `pv` int(11) DEFAULT NULL,
  `degat` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_heros_modele` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_illustration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `carte_modele` (`id_carte_modele`, `nom`, `pv`, `degat`, `prix`, `id_heros_modele`, `id_type`, `id_illustration`) VALUES
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

CREATE TABLE `carte_partie` (
  `id_carte_partie` int(11) NOT NULL,
  `pv` int(11) DEFAULT NULL,
  `degat` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_carte_modele` int(11) NOT NULL,
  `id_heros_partie` int(11) DEFAULT NULL,
  `id_statut` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `carte_partie` (`id_carte_partie`, `pv`, `degat`, `prix`, `id_carte_modele`, `id_heros_partie`, `id_statut`, `id_type`) VALUES
(1, 9, 9, 9, 1, 1, 1, 1),
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

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL,
  `id_action` int(11) NOT NULL,
  `id_carte_partie` int(11) NOT NULL,
  `id_heros_partie` int(11) DEFAULT NULL,
  `id_carte_partie_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `heros_modele` (
  `id_heros_modele` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `pv` int(11) NOT NULL,
  `cagnotte` int(11) NOT NULL,
  `id_illustration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `heros_modele` (`id_heros_modele`, `nom`, `statut`, `pv`, `cagnotte`, `id_illustration`) VALUES
(1, 'Hans Zimmer', '', 20, 0, 1),
(2, 'Fast Food', '', 20, 0, 1);

CREATE TABLE `heros_partie` (
  `id_heros_partie` int(11) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `pv` int(11) NOT NULL,
  `cagnotte` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_heros_modele` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `heros_partie` (`id_heros_partie`, `statut`, `pv`, `cagnotte`, `id_joueur`, `id_heros_modele`) VALUES
(1, '', 20, 0, 1, 1),
(2, '', 20, 0, 2, 2);

CREATE TABLE `illustration` (
  `id_illustration` int(11) NOT NULL,
  `path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `illustration` (`id_illustration`, `path`) VALUES
(1, 'url');

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `naissance` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  `ratio_vd` int(11) NOT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `en_ligne` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `joueur` (`id_joueur`, `pseudo`, `prenom`, `nom`, `naissance`, `email`, `mot_de_passe`, `ratio_vd`, `adresse`, `code_postal`, `ville`, `telephone`, `en_ligne`) VALUES
(1, 'pilou', 'pilou', 'pilou', '2017-12-04', '', 'pilou', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'poilu', 'poilu', 'poilu', '2017-12-12', 'poilu', 'poilu', 1, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE `partie` (
  `id_partie` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cpt_tour` int(11) DEFAULT NULL,
  `id_heros_partie` int(11) DEFAULT NULL,
  `id_heros_partie_1` int(11) DEFAULT NULL,
  `id_plateau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `plateau` (
  `id_plateau` int(11) NOT NULL,
  `id_illustration` int(11) NOT NULL,
  `id_heros_modele` int(11) DEFAULT NULL,
  `id_heros_modele_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `plateau` (`id_plateau`, `id_illustration`, `id_heros_modele`, `id_heros_modele_1`) VALUES
(1, 1, 2, 1);

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `statut` (`id_statut`, `libelle`) VALUES
(1, 'Deck'),
(2, 'Main'),
(3, 'Attente'),
(4, 'Combat'),
(5, 'Cimetière');

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `type` (`id_type`, `libelle`) VALUES
(1, 'Créature'),
(2, 'Bouclier'),
(3, 'Sort');


ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `FK_action_id_illustration` (`id_illustration`);

ALTER TABLE `carte_modele`
  ADD PRIMARY KEY (`id_carte_modele`),
  ADD KEY `FK_carte_modele_id_type` (`id_type`),
  ADD KEY `FK_carte_modele_id_illustration` (`id_illustration`),
  ADD KEY `FK_carte_modele_id_heros_modele` (`id_heros_modele`);

ALTER TABLE `carte_partie`
  ADD PRIMARY KEY (`id_carte_partie`),
  ADD KEY `FK_carte_partie_id_carte_modele` (`id_carte_modele`),
  ADD KEY `FK_carte_partie_id_heros_partie` (`id_heros_partie`),
  ADD KEY `FK_carte_partie_id_statut` (`id_statut`),
  ADD KEY `FK_carte_partie_id_type` (`id_type`);

ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `FK_evenement_id_partie` (`id_partie`),
  ADD KEY `FK_evenement_id_action` (`id_action`),
  ADD KEY `FK_evenement_id_carte_partie` (`id_carte_partie`),
  ADD KEY `FK_evenement_id_heros_partie` (`id_heros_partie`),
  ADD KEY `FK_evenement_id_carte_partie_1` (`id_carte_partie_1`);

ALTER TABLE `heros_modele`
  ADD PRIMARY KEY (`id_heros_modele`),
  ADD KEY `FK_heros_modele_id_illustration` (`id_illustration`);

ALTER TABLE `heros_partie`
  ADD PRIMARY KEY (`id_heros_partie`),
  ADD KEY `FK_heros_partie_id_joueur` (`id_joueur`),
  ADD KEY `FK_heros_partie_id_heros_modele` (`id_heros_modele`);

ALTER TABLE `illustration`
  ADD PRIMARY KEY (`id_illustration`);

ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

ALTER TABLE `partie`
  ADD PRIMARY KEY (`id_partie`),
  ADD KEY `FK_partie_id_heros_partie` (`id_heros_partie`),
  ADD KEY `FK_partie_id_heros_partie_1` (`id_heros_partie_1`),
  ADD KEY `FK_partie_id_plateau` (`id_plateau`);

ALTER TABLE `plateau`
  ADD PRIMARY KEY (`id_plateau`),
  ADD KEY `FK_plateau_id_illustration` (`id_illustration`),
  ADD KEY `FK_plateau_id_heros_modele` (`id_heros_modele`),
  ADD KEY `FK_plateau_id_heros_modele_1` (`id_heros_modele_1`);

ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);


ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `carte_modele`
  MODIFY `id_carte_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
ALTER TABLE `carte_partie`
  MODIFY `id_carte_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `heros_modele`
  MODIFY `id_heros_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `heros_partie`
  MODIFY `id_heros_partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `illustration`
  MODIFY `id_illustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `partie`
  MODIFY `id_partie` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `plateau`
  MODIFY `id_plateau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `action`
  ADD CONSTRAINT `FK_action_id_illustration` FOREIGN KEY (`id_illustration`) REFERENCES `illustration` (`id_illustration`);

ALTER TABLE `carte_modele`
  ADD CONSTRAINT `FK_carte_modele_id_heros_modele` FOREIGN KEY (`id_heros_modele`) REFERENCES `heros_modele` (`id_heros_modele`),
  ADD CONSTRAINT `FK_carte_modele_id_illustration` FOREIGN KEY (`id_illustration`) REFERENCES `illustration` (`id_illustration`),
  ADD CONSTRAINT `FK_carte_modele_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

ALTER TABLE `carte_partie`
  ADD CONSTRAINT `FK_carte_partie_id_carte_modele` FOREIGN KEY (`id_carte_modele`) REFERENCES `carte_modele` (`id_carte_modele`),
  ADD CONSTRAINT `FK_carte_partie_id_heros_partie` FOREIGN KEY (`id_heros_partie`) REFERENCES `heros_partie` (`id_heros_partie`),
  ADD CONSTRAINT `FK_carte_partie_id_statut` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`),
  ADD CONSTRAINT `FK_carte_partie_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_evenement_id_action` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `FK_evenement_id_carte_partie` FOREIGN KEY (`id_carte_partie`) REFERENCES `carte_partie` (`id_carte_partie`),
  ADD CONSTRAINT `FK_evenement_id_carte_partie_1` FOREIGN KEY (`id_carte_partie_1`) REFERENCES `carte_partie` (`id_carte_partie`),
  ADD CONSTRAINT `FK_evenement_id_heros_partie` FOREIGN KEY (`id_heros_partie`) REFERENCES `heros_partie` (`id_heros_partie`),
  ADD CONSTRAINT `FK_evenement_id_partie` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id_partie`);

ALTER TABLE `heros_modele`
  ADD CONSTRAINT `FK_heros_modele_id_illustration` FOREIGN KEY (`id_illustration`) REFERENCES `illustration` (`id_illustration`);

ALTER TABLE `heros_partie`
  ADD CONSTRAINT `FK_heros_partie_id_heros_modele` FOREIGN KEY (`id_heros_modele`) REFERENCES `heros_modele` (`id_heros_modele`),
  ADD CONSTRAINT `FK_heros_partie_id_joueur` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`);

ALTER TABLE `partie`
  ADD CONSTRAINT `FK_partie_id_heros_partie` FOREIGN KEY (`id_heros_partie`) REFERENCES `heros_partie` (`id_heros_partie`),
  ADD CONSTRAINT `FK_partie_id_heros_partie_1` FOREIGN KEY (`id_heros_partie_1`) REFERENCES `heros_partie` (`id_heros_partie`),
  ADD CONSTRAINT `FK_partie_id_plateau` FOREIGN KEY (`id_plateau`) REFERENCES `plateau` (`id_plateau`);

ALTER TABLE `plateau`
  ADD CONSTRAINT `FK_plateau_id_heros_modele` FOREIGN KEY (`id_heros_modele`) REFERENCES `heros_modele` (`id_heros_modele`),
  ADD CONSTRAINT `FK_plateau_id_heros_modele_1` FOREIGN KEY (`id_heros_modele_1`) REFERENCES `heros_modele` (`id_heros_modele`),
  ADD CONSTRAINT `FK_plateau_id_illustration` FOREIGN KEY (`id_illustration`) REFERENCES `illustration` (`id_illustration`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
