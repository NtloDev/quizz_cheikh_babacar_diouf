-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 juin 2020 à 10:29
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `choix1` varchar(50) NOT NULL,
  `choix2` varchar(50) NOT NULL,
  `choix3` varchar(50) NOT NULL,
  `choix4` varchar(50) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `intitule_question`, `nbrpoints_question`, `Type_question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `choix1`, `choix2`, `choix3`, `choix4`) VALUES
(14, 'cheikh', 8, 'choixmultiple', 'jean', 'blue', 'IOS', 'HTML', '', '', '', ''),
(15, 'cheikh', 8, 'choixmultiple', 'jean', 'Bill Gates', 'blue', 'WAN', 'rep1', '', 'rep3', ''),
(16, 'cheikh', 8, 'choixmultiple', 'jean', 'PHP', '', '', '', 'rep2', '', ''),
(17, 'cheikh', 7, 'choixmultiple', 'jean', 'blue', 'IOS', 'vs code', 'reponse1', 'reponse2', 'reponse3', 'reponse4'),
(18, 'cheikh', 7, 'unseulchoix', 'welcom', 'blue', 'blue', 'HTML', '', '', '', ''),
(19, 'cheikh', 7, 'unseulchoix', 'jean', 'marc', '', '', 'reponse1', 'reponse2', '', ''),
(20, 'cheikh', 7, 'texte', 'World wide web', '', '', '', '', '', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id_sore`, `val_score`, `id_user`) VALUES
(1, 0, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `type_user`, `login_user`, `pwd_user`, `name_user`, `prenom_user`) VALUES
(1, 'admin', 'admin', 'admin', 'Diouf', 'Cheikh'),
(2, 'joueur', 'joueur', 'joueur', 'Ndiaye', 'Ousman'),
(31, 'joueur', 'fatou', 'fatou', 'Faye', 'Fatou'),
(38, 'admin', 'xeuy', 'nnnnn', 'NTLO', 'Xeuy');

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
