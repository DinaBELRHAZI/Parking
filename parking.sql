-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 sep. 2018 à 08:04
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

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

-- --------------------------------------------------------

--
-- Structure de la table `historiqueplace`
--

DROP TABLE IF EXISTS `historiqueplace`;
CREATE TABLE IF NOT EXISTS `historiqueplace` (
  `id_p` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `datedebut` int(11) NOT NULL,
  `datefin` int(11) NOT NULL,
  KEY `idp` (`id_p`),
  KEY `idu` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `linkplace`
--

DROP TABLE IF EXISTS `linkplace`;
CREATE TABLE IF NOT EXISTS `linkplace` (
  `id_lp` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `expiration` int(11) NOT NULL,
  KEY `iduser` (`id_u`),
  KEY `idplace` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listeattente`
--

DROP TABLE IF EXISTS `listeattente`;
CREATE TABLE IF NOT EXISTS `listeattente` (
  `id_la` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `placefileattente` int(11) NOT NULL,
  `datedemande` int(11) NOT NULL,
  KEY `linkuser` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id_p` int(11) NOT NULL,
  `numeroplace` int(11) NOT NULL,
  UNIQUE KEY `primarykey` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_u` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prénom` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Admin` int(11) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historiqueplace`
--
ALTER TABLE `historiqueplace`
  ADD CONSTRAINT `idp` FOREIGN KEY (`id_p`) REFERENCES `place` (`id_p`),
  ADD CONSTRAINT `idu` FOREIGN KEY (`id_u`) REFERENCES `utilisateurs` (`id_u`);

--
-- Contraintes pour la table `linkplace`
--
ALTER TABLE `linkplace`
  ADD CONSTRAINT `idplace` FOREIGN KEY (`id_p`) REFERENCES `place` (`id_p`),
  ADD CONSTRAINT `iduser` FOREIGN KEY (`id_u`) REFERENCES `utilisateurs` (`id_u`);

--
-- Contraintes pour la table `listeattente`
--
ALTER TABLE `listeattente`
  ADD CONSTRAINT `linkuser` FOREIGN KEY (`id_u`) REFERENCES `utilisateurs` (`id_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
