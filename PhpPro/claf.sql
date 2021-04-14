-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 avr. 2021 à 21:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncf`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_fil` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fil` (`id_fil`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `code`, `nom`, `id_fil`) VALUES
(37, 'F1', 'classe2020', '2ITE'),
(38, 'C12', 'classe2020', 'GI'),
(39, 'C1gggg', 'GENIE INDUSTRIEL', 'G2E'),
(40, 'F1', 'classe2020', '2ITE'),
(41, 'C1gggg', 'classe2020', 'G2E'),
(42, '1', 'classe2020', 'G2E'),
(43, 'F1', 'ggg', 'G2E'),
(44, '1', 'dfg', 'G2E'),
(45, 'F1', 'classe2020', '2ITE'),
(46, 'F1', 'dfg', 'GI'),
(47, 'F1', 'classe2020', 'G2E'),
(48, 'C1gggg', 'classe2020', 'G2E'),
(49, 'F1', 'dfg', 'GI'),
(50, 'F1', 'GENIE INDUSTRIEL', '2ITE');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `fonction` int(11) NOT NULL,
  `departement` int(11) NOT NULL,
  PRIMARY KEY (`cin`),
  KEY `fonction` (`fonction`),
  KEY `departement` (`departement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`cin`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `password`, `role`, `photo`, `fonction`, `departement`) VALUES
('EE55021', 'Waziz', 'Moussaab', 'lachgar.m@gmail.com', '0687862800', 'Berradi 3', 'ab4f63f9ac65152575886860dde480a1', 'Admin', '5f727e9d8c0bbb30b046cf94d1d9a9f1.jpg', 19, 8),
('EE60601', 'Sarmadi', 'Yassin', 'srmooda@gmail.com', '0634805857', 'SYBA', '3a3eb71f692b9a0f04b44cce1fd1376a', 'Admin', '1ea72174d8063872c4776e122803f0f4.JPG', 20, 5),
('EE819349', 'Barhoum', 'Abdellah', 'iambarhoum@gmail.com', '0659778996', 'SYBA', 'ab4f63f9ac65152575886860dde480a1', 'Directeur', '73022302012b2e215e935b1639464707.jpeg', 21, 4);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `abr` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `code`, `libelle`, `abr`) VALUES
(9, '1', 'genie informatique', '2ITE'),
(11, '2', 'genie energetique', 'G2E'),
(12, 'C1gggg', 'GENIE INDUSTRIELLE', 'GI');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
