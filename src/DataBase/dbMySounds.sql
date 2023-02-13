-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 13 fév. 2023 à 11:08
-- Version du serveur :  10.3.37-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3-4ubuntu2.17

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
  `nomImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `STYLES`
--

CREATE TABLE `STYLES` (
  `idStyle` int(11) NOT NULL,
  `nomStyle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `email` int(255) NOT NULL,
  `motDePasse` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  ADD PRIMARY KEY (`idStyle`);

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
  MODIFY `idStyle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

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
