-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 juin 2020 à 10:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `nbrquestion`
--

DROP TABLE IF EXISTS `nbrquestion`;
CREATE TABLE IF NOT EXISTS `nbrquestion` (
  `id_nbrquestion` int(11) NOT NULL AUTO_INCREMENT,
  `val_nbrquestion` int(11) NOT NULL,
  PRIMARY KEY (`id_nbrquestion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nbrquestion`
--

INSERT INTO `nbrquestion` (`id_nbrquestion`, `val_nbrquestion`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_question` varchar(500) NOT NULL,
  `nbrpoints_question` int(11) NOT NULL,
  `Type_question` varchar(500) NOT NULL,
  `reponse1` varchar(500) NOT NULL,
  `reponse2` varchar(500) NOT NULL,
  `reponse3` varchar(500) NOT NULL,
  `reponse4` varchar(500) NOT NULL,
  `choix1` varchar(500) NOT NULL,
  `choix2` varchar(500) NOT NULL,
  `choix3` varchar(500) NOT NULL,
  `choix4` varchar(500) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `intitule_question`, `nbrpoints_question`, `Type_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `choix1`, `choix2`, `choix3`, `choix4`) VALUES
(11, 'Le corona viens de', 6, 'choixmultiple', 'La Chine', 'Les USA', '', '', 'reponse1', '', '', ''),
(20, 'De quoi commence la devise du Senegal', 5, 'choixmultiple', 'Un but', 'Un peuple', 'Une foi', '', '', 'reponse2', '', ''),
(21, 'Le Senegal est un pays', 5, 'choixmultiple', 'Communiste', 'Democratique', '', '', '', 'reponse2', '', ''),
(22, 'Nelson Mandela a fais la prison pendant', 5, 'choixmultiple', '2 mois', '27 ans', '7 ans', '', '', 'reponse2', '', ''),
(23, 'Quelle est lunite de mesure de la musique', 5, 'choixmultiple', 'Le decibelle', 'Le centimetre', '', '', 'reponse1', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id_sore` int(11) NOT NULL AUTO_INCREMENT,
  `val_score` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_sore`),
  UNIQUE KEY `score_user_AK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id_sore`, `val_score`, `id_user`) VALUES
(1, 10, 2),
(2, 5, 31),
(3, 7, 39),
(4, 10, 40),
(5, 12, 41),
(6, 15, 42),
(7, 17, 43),
(8, 20, 44),
(9, 22, 45),
(10, 25, 46),
(11, 27, 47),
(12, 28, 48),
(13, 30, 49),
(14, 32, 50),
(15, 45, 51),
(16, 47, 52),
(17, 50, 53),
(18, 52, 54),
(19, 57, 55),
(20, 60, 56),
(25, 60, 57);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `type_user` varchar(50) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `pwd_user` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `type_user`, `login_user`, `pwd_user`, `name_user`, `prenom_user`) VALUES
(1, 'admin', 'admin', 'admin', 'NDIAYE', 'Cheikh Babacar'),
(2, 'joueur', 'joueur', 'joueur', 'Ndiaye', 'Ousman'),
(31, 'joueur', 'fatou', 'fatou', 'Faye', 'Fatou'),
(38, 'admin', 'xeuy', 'nnnnn', 'NTLO', 'Xeuy'),
(39, 'joueur', 'henri', 'henri', 'DIOP', 'Henri'),
(40, 'joueur', 'babacar', 'babacar', 'NDIAYE', 'Babacar'),
(41, 'joueur', 'ansou', 'ansou', 'FATY', 'Ansou'),
(42, 'joueur', 'mamadou', 'mamadou', 'GUEYE', 'Mamadou'),
(43, 'joueur', 'eliane', 'eliane', 'GAKOU', 'Eliane'),
(44, 'joueur', 'sekou', 'sekou', 'TOURE', 'Sekou'),
(45, 'joueurbloque', 'boucary', 'boucary', 'SALL', 'Boucary'),
(46, 'joueurbloque', 'aliou', 'aliou', 'NIASS', 'Aliou'),
(47, 'joueur', 'alphonse', 'alphonse', 'SARR', 'Alphonse'),
(48, 'joueur', 'jeannette', 'jeannette', 'MENDY', 'Jeannette'),
(49, 'joueurbloque', 'woury', 'woury', 'MANE', 'Woury'),
(50, 'joueur', 'macky', 'macky', 'DIOUF', 'Macky'),
(51, 'joueur', 'albert', 'albert', 'GATES', 'Albert'),
(52, 'joueur', 'steve', 'steve', 'JACKSON', 'Steve'),
(53, 'joueur', 'krepin', 'krepin', 'SANE', 'Krepin'),
(54, 'joueur', 'maodo', 'maodo', 'FALL', 'Maodo'),
(55, 'joueurbloque', 'diarra', 'diarra', 'FAYE', 'Diarra'),
(56, 'joueurbloque', 'pape', 'pape', 'DIEDIOU', 'Pape'),
(57, 'joueurbloque', 'lansana', 'lansana', 'DIOP', 'Lansana'),
(60, 'joueur', 'Mai', 'maimouna', 'Fall', 'Maimouna ');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
