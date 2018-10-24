-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 oct. 2018 à 20:57
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parking`
--
CREATE DATABASE IF NOT EXISTS `parking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parking`;

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `numeroplace` int(11) NOT NULL,
  UNIQUE KEY `primarykey` (`id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id_p`, `numeroplace`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `datefin` date NOT NULL,
  KEY `id_u` (`id_u`),
  KEY `id_p` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_u`, `id_p`, `datefin`) VALUES
(1, 1, '2018-11-24'),
(2, 2, '2018-11-24'),
(3, 3, '2018-11-24'),
(5, 4, '2018-11-24'),
(6, 5, '2018-11-24'),
(7, 6, '2018-11-24'),
(8, 7, '2018-11-24'),
(9, 8, '2018-11-24'),
(10, 9, '2018-11-24'),
(11, 10, '2018-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '0',
  `placefileattente` int(11) NOT NULL DEFAULT '0',
  `historique` varchar(255) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `nom`, `prenom`, `email`, `password`, `lvl`, `placefileattente`, `historique`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3, 0, '1,'),
(2, 'admin1', 'admin1', 'admin1@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 0, '2,'),
(3, 'admin2', 'admin2', 'admin2@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '3,'),
(5, 'admin3', 'admin3', 'admin3@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '4,'),
(6, 'admin4', 'admin4', 'admin4@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '5,'),
(7, 'admin5', 'admin5', 'admin5@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '6,'),
(8, 'admin6', 'admin6', 'admin6@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '7,'),
(9, 'admin7', 'admin7', 'admin7@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '8,'),
(10, 'admin8', 'admin8', 'admin8@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '9,'),
(11, 'admin9', 'admin9', 'admin9@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, '10,'),
(12, 'admin10', 'admin10', 'admin10@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1, ''),
(13, 'admin11', 'admin11', 'admin11@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 0, '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `id_p` FOREIGN KEY (`id_p`) REFERENCES `place` (`id_p`),
  ADD CONSTRAINT `id_u` FOREIGN KEY (`id_u`) REFERENCES `user` (`id_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
