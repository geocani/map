-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Novembre 2016 à 17:13
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `game`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `id_Joueur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Joueur` varchar(250) NOT NULL,
  `Reponse_Joueur` varchar(250) DEFAULT NULL,
  `Score_Joueur` int(11) DEFAULT NULL,
  `Adresse_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id_Joueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id_Joueur`, `Nom_Joueur`, `Reponse_Joueur`, `Score_Joueur`, `Adresse_ip`) VALUES
(1, 'Maman', NULL, NULL, '192.168.43.56'),
(2, 'Boris', NULL, 1, '192.168.43.1'),
(3, '', 'A', 0, ''),
(4, 'Maman', NULL, 1, '192.168.43.56'),
(5, 'Boris', NULL, 1, '192.168.43.1'),
(6, 'Maman', NULL, 0, '192.168.43.56'),
(7, 'Boris', NULL, 1, '192.168.43.1'),
(8, 'Maman', NULL, NULL, '192.168.43.56'),
(9, 'Boris', NULL, NULL, '192.168.43.1'),
(10, 'Maman', NULL, NULL, '192.168.43.56'),
(11, 'Boris', NULL, NULL, '192.168.43.1'),
(12, 'Gautier', NULL, 0, '192.168.173.182'),
(13, 'Fabio', NULL, 2, '192.168.173.1'),
(14, 'Gauty', NULL, NULL, '127.0.0.1'),
(15, 'Perry', NULL, NULL, '192.168.173.1'),
(16, 'NNFP', NULL, NULL, '192.168.173.1'),
(17, 'Bernard', NULL, NULL, '127.0.0.1'),
(18, 'Tablette23', NULL, 0, '192.168.173.182'),
(19, 'PF', NULL, 0, '192.168.173.1'),
(20, 'Gauty', NULL, NULL, '127.0.0.1'),
(21, 'Tablette23', NULL, NULL, '192.168.173.182'),
(22, 'Tablette23', NULL, 0, '192.168.173.182'),
(23, 'ordi', NULL, 1, '127.0.0.1'),
(24, 'fhjh', NULL, 0, '127.0.0.1'),
(25, 'khbsf', NULL, 0, '127.0.0.1'),
(26, 'Fabio', NULL, NULL, '192.168.43.62'),
(27, 'Gautier', NULL, 1, '192.168.43.62'),
(28, 'Nouassi', NULL, 1, '192.168.43.45'),
(29, 'Fabio', NULL, 0, '192.168.43.62'),
(30, 'Zechirine', NULL, 1, '192.168.43.45');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `Id_Questionnaire` int(11) NOT NULL AUTO_INCREMENT,
  `Question` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `Reponse` text NOT NULL,
  PRIMARY KEY (`Id_Questionnaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `questionnaire`
--

INSERT INTO `questionnaire` (`Id_Questionnaire`, `Question`, `A`, `B`, `C`, `D`, `Reponse`) VALUES
(1, 'quelle est la capitale du Cameroun?', 'Douala', 'Yaounde', 'Buea', 'Limbe', 'B'),
(2, 'Quel est le reseau social le plus utilisé au monde?', 'Whatsap', 'twitter', 'facebook', 'instagram', 'C'),
(3, 'quelle est la premiere puissance economique au monde?', 'Etas-unis', 'Chine', 'France', 'Allemagne', 'B'),
(4, 'quel est le nom du president Americain?', 'Barack Obama', 'Hilary Clinton', 'Donald Trump', 'Bill Gates', 'C'),
(5, 'quel est le systeme d''exploitation pour machine le plus utilisé?', 'Linux', 'Mac OS', 'Ms Dos', 'Windows', 'D'),
(6, 'dans quel pays ont eu lieu les JO 2016?', 'Chine', 'Bresil', 'Suede', 'Allemagne', 'B'),
(7, 'dans quel pays se deroulera la coupe du monde football 2022?', 'Bresil', 'Etas-Unis', 'Espagne', 'Quatar', 'D'),
(8, 'Quel est le plus grand fleuve d''Afrique?', 'Nil', 'Sanaga', 'Moungo', 'Mediteranée', 'A'),
(9, 'quel est le systeme d''exploitation mobile le plus utilisé??', 'Ios', 'Windows', 'BlackBerry', 'Android', 'D'),
(10, 'Dans quelle ville se deroulera les JO 2020?', 'Tokyo', 'Brasilia', 'Munich', 'Rome', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `random`
--

CREATE TABLE IF NOT EXISTS `random` (
  `Id_Random` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Q` int(11) NOT NULL,
  PRIMARY KEY (`Id_Random`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `random`
--

INSERT INTO `random` (`Id_Random`, `Num_Q`) VALUES
(1, 8),
(2, 10),
(3, 2),
(4, 8),
(5, 1),
(6, 7),
(7, 1),
(8, 1),
(9, 8),
(10, 3),
(11, 2),
(12, 8),
(13, 9),
(14, 2),
(15, 10),
(16, 4),
(17, 4),
(18, 4),
(19, 9),
(20, 5),
(21, 2),
(22, 2),
(23, 2),
(24, 6),
(25, 4),
(26, 4),
(27, 7),
(28, 2),
(29, 7),
(30, 9);

-- --------------------------------------------------------

--
-- Structure de la table `reponses1`
--

CREATE TABLE IF NOT EXISTS `reponses1` (
  `Id_Reponse1` int(11) NOT NULL AUTO_INCREMENT,
  `Rep_Joueur1` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Reponse1`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `reponses1`
--

INSERT INTO `reponses1` (`Id_Reponse1`, `Rep_Joueur1`) VALUES
(1, 'C'),
(2, 'C'),
(3, 'A'),
(4, 'A');

-- --------------------------------------------------------

--
-- Structure de la table `reponses2`
--

CREATE TABLE IF NOT EXISTS `reponses2` (
  `Id_Reponse2` int(11) NOT NULL AUTO_INCREMENT,
  `Rep_Joueur2` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Reponse2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reponses2`
--

INSERT INTO `reponses2` (`Id_Reponse2`, `Rep_Joueur2`) VALUES
(1, 'C'),
(2, 'C'),
(3, 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
