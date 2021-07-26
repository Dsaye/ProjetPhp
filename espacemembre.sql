-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 juil. 2021 à 10:40
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
-- Base de données : `espacemembre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

DROP TABLE IF EXISTS `cotisation`;
CREATE TABLE IF NOT EXISTS `cotisation` (
  `NumCotis` int(10) NOT NULL AUTO_INCREMENT,
  `DateCotis` date NOT NULL,
  `Mois` varchar(50) NOT NULL,
  `Motif` varchar(50) NOT NULL,
  `Montant` int(50) NOT NULL,
  `Matricule` int(10) NOT NULL,
  PRIMARY KEY (`NumCotis`),
  KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cotisation`
--

INSERT INTO `cotisation` (`NumCotis`, `DateCotis`, `Mois`, `Motif`, `Montant`, `Matricule`) VALUES
(1, '2021-07-21', 'juillet', 'Inscription', 5000, 1),
(3, '2021-07-21', 'juillet', 'MensualitÃ©', 2500, 3),
(5, '2021-07-21', 'juillet', 'MensualitÃ©', 2500, 3),
(8, '2021-07-22', 'juillet', 'Inscription', 5000, 9),
(9, '2021-07-23', 'juillet', 'MensualitÃ©', 2500, 9),
(11, '2021-08-02', 'aout', 'Inscription', 5000, 17),
(12, '2021-07-26', 'juillet', 'Inscription', 5000, 18);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `Matricule` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Adresse` text NOT NULL,
  `Tel` varchar(50) NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`Matricule`, `Nom`, `Prenom`, `Adresse`, `Tel`) VALUES
(1, 'SAYE', 'Djibril', 'guediawaye', '772187046'),
(3, 'Mbodje ', 'Sokhna Awa', 'gueule tapÃ©2', '781886406'),
(6, 'Drame', 'Babacar', 'dakar', '770880875'),
(7, 'Drame', 'Babacar', 'dakar', '770880875'),
(9, 'FALL', 'Hamady', 'Gounass', '776604895'),
(17, 'Pouye', 'Fatim', 'Darou Salam', '776417409'),
(18, 'Faye', 'Ndella', 'Guediawaye', '773676689');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD CONSTRAINT `cotisation_ibfk_1` FOREIGN KEY (`Matricule`) REFERENCES `membre` (`Matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
