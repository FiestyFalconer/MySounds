-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 mars 2023 à 13:18
-- Version du serveur :  10.3.38-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbMySounds`
--
CREATE DATABASE IF NOT EXISTS `dbMySounds` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbMySounds`;

-- --------------------------------------------------------

--
-- Structure de la table `FAVORIS`
--

CREATE TABLE `FAVORIS` (
  `idMusique` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MUSIQUES`
--

CREATE TABLE `MUSIQUES` (
  `idMusique` int(11) NOT NULL,
  `nomCreator` varchar(255) NOT NULL,
  `dateSortie` date NOT NULL,
  `nomImage` varchar(200) NOT NULL,
  `nomMusique` varchar(100) NOT NULL,
  `mp3Musique` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `STYLES`
--

CREATE TABLE `STYLES` (
  `idStyle` int(11) NOT NULL,
  `nomStyle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `STYLES`
--

INSERT INTO `STYLES` (`idStyle`, `nomStyle`) VALUES
(20, 'Africa'),
(29, 'Alternative'),
(30, 'Anime'),
(22, 'Asia'),
(16, 'Blues'),
(17, 'Children'),
(21, 'Christian'),
(13, 'Classical'),
(7, 'Country'),
(12, 'Disco'),
(33, 'Disney'),
(14, 'Eletronic'),
(26, 'Experimental'),
(9, 'Folk'),
(8, 'Funk'),
(2, 'Hip hop'),
(25, 'Independent'),
(34, 'Indie Pop'),
(35, 'Instrumental'),
(11, 'Jazz'),
(36, 'Karaoke'),
(15, 'Latin America'),
(27, 'Metal'),
(10, 'Middle Eastern'),
(18, 'New-age'),
(37, 'Opera'),
(1, 'Pop'),
(38, 'Progressive'),
(28, 'Punk'),
(6, 'Reggae'),
(4, 'Rhythm and blues'),
(3, 'Rock'),
(23, 'Ska'),
(5, 'Soul'),
(39, 'SoundTrack'),
(24, 'Traditional'),
(31, 'Trance'),
(32, 'Trap'),
(19, 'Vocal');

-- --------------------------------------------------------

--
-- Structure de la table `STYLES_MUSIQUES`
--

CREATE TABLE `STYLES_MUSIQUES` (
  `idMusique` int(11) NOT NULL,
  `idStyle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEURS`
--

CREATE TABLE `UTILISATEURS` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `UTILISATEURS`
--

INSERT INTO `UTILISATEURS` (`idUser`, `nom`, `email`, `motDePasse`, `admin`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$99okOUzUsiRITy77kvApDuL.1r0olB2uU6eyDSaUvAkk1NpbpgA9a', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `FAVORIS`
--
ALTER TABLE `FAVORIS`
  ADD KEY `idMusique` (`idMusique`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `MUSIQUES`
--
ALTER TABLE `MUSIQUES`
  ADD PRIMARY KEY (`idMusique`);

--
-- Index pour la table `STYLES`
--
ALTER TABLE `STYLES`
  ADD PRIMARY KEY (`idStyle`),
  ADD UNIQUE KEY `nomStyle` (`nomStyle`);

--
-- Index pour la table `STYLES_MUSIQUES`
--
ALTER TABLE `STYLES_MUSIQUES`
  ADD KEY `idMusique` (`idMusique`),
  ADD KEY `idStyle` (`idStyle`);

--
-- Index pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `MUSIQUES`
--
ALTER TABLE `MUSIQUES`
  MODIFY `idMusique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `STYLES`
--
ALTER TABLE `STYLES`
  MODIFY `idStyle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `FAVORIS`
--
ALTER TABLE `FAVORIS`
  ADD CONSTRAINT `FAVORIS_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `UTILISATEURS` (`idUser`),
  ADD CONSTRAINT `FAVORIS_ibfk_2` FOREIGN KEY (`idMusique`) REFERENCES `MUSIQUES` (`idMusique`);

--
-- Contraintes pour la table `STYLES_MUSIQUES`
--
ALTER TABLE `STYLES_MUSIQUES`
  ADD CONSTRAINT `STYLES_MUSIQUES_ibfk_1` FOREIGN KEY (`idMusique`) REFERENCES `MUSIQUES` (`idMusique`),
  ADD CONSTRAINT `STYLES_MUSIQUES_ibfk_2` FOREIGN KEY (`idStyle`) REFERENCES `STYLES` (`idStyle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
