-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 avr. 2023 à 17:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom`, `telephone`, `mail`) VALUES
(1, 'Groupe 1', '11 11 11 11 11', 'groupe1@gmail.com'),
(2, 'Groupe 2', '22 22 22 22 22', 'groupe2@gmail.com'),
(3, 'Groupe 3', '33 33 33 33 33', 'groupe3@gmail.com'),
(4, 'Groupe 4', '44 44 44 44 44', 'groupe4@gmail.com'),
(5, 'Groupe 5', '55 55 55 55 55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `telephone` varchar(150) DEFAULT NULL,
  `groupeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupeId` (`groupeId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `mail`, `telephone`, `groupeId`) VALUES
(1, 'Michel Berger', 'm.berger@gmail.com', '12 12 12 12 12', 1),
(2, 'Michel Platza', 'm.platza@gmail.com', '13 13 13 13 13', 1),
(3, 'Patrick Bibel', 'p.bibel@gmail.com', '14 14 14 14 14', 2),
(4, 'Harry Potter', 'h.potter@gmail.com', '15 15 15 15 15', 2),
(5, 'Jason Statam', 'j.statam@gmail.com', '99 99 99 99 99', 3),
(6, 'Benjamin Lajoie', 'b.lajoie@gmail.com', '17 17 17 17 17', 3),
(7, 'Jean-Luc Mouchard', 'jl.mouchard@gmail.com', '18 18 18 18 18', 4),
(8, 'Tata Ayrault', NULL, '19 19 19 19 19', 4),
(9, 'Jeremy Michtouille', 'j.michtouille@gmail.com', NULL, 5),
(10, 'LeGars Anonyme', 'g.anonyme@gmail.com', '21 21 21 21 21', 5),
(11, 'Romy TheCat', 'r.thecat', '16 16 16 16 16', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idUser` int(11) NOT NULL,
  `idVehicule` int(11) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `Reservation_Utilisateur_FK` (`idUser`),
  KEY `Reservation_Vehicule0_FK` (`idVehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `dateDebut`, `dateFin`, `idUser`, `idVehicule`) VALUES
(5, '2023-04-13', '2023-04-15', 6, 3),
(6, '2023-04-15', '2023-04-17', 6, 5),
(7, '2023-04-15', '2023-04-18', 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `aPermis` tinyint(1) DEFAULT NULL,
  `nomUser` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `psw`, `aPermis`, `nomUser`) VALUES
(1, 'Platza', 'Michel', '123', 0, 'michel.platza'),
(4, 'Ayrault', 'Super', '123', 1, 'super.ayrault'),
(5, 'De Oliveira', 'Vincent', '123', 0, 'vincent.de-oliveira'),
(6, 'Chanudet', 'Martin', '123', 1, 'martin.chanudet'),
(7, 'Ragu', 'Jules', '123', 0, 'jules.ragu'),
(8, 'Batista', 'Ugo', '123', 0, 'ugo.batista'),
(9, 'Manceau', 'Arthur', '123', 1, 'arthur.manceau');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `idVehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  PRIMARY KEY (`idVehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`idVehicule`, `marque`, `modele`) VALUES
(1, 'Peugeot', '407'),
(2, 'Renault', 'Kangoo'),
(3, 'Porsche', '911'),
(4, 'Citroën', 'C15'),
(5, 'Renault', 'Express');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Reservation_Utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `Reservation_Vehicule0_FK` FOREIGN KEY (`idVehicule`) REFERENCES `vehicule` (`idVehicule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
