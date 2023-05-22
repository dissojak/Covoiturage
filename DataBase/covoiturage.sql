-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 mai 2023 à 13:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `idlocation` int(11) NOT NULL,
  `nbplace` int(11) NOT NULL,
  `prix` int(3) NOT NULL,
  `datedepare` datetime NOT NULL,
  `villedepare` varchar(20) NOT NULL,
  `villefin` varchar(20) NOT NULL,
  `Cin` int(11) NOT NULL,
  `mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`idlocation`, `nbplace`, `prix`, `datedepare`, `villedepare`, `villefin`, `Cin`, `mat`) VALUES
(2, 0, 25, '2023-05-18 06:15:00', 'nabeul', 'tunis', 14418249, 1325669656),
(3, -3, 50, '2023-05-20 02:24:00', 'nabeul', 'tunis', 14418266, 14785236),
(5, 4, 60, '2023-05-20 03:48:00', 'nabeul', 'tunis', 14418248, 1325669656);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `pw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`username`, `pw`) VALUES
('dissojak', '123'),
('dissojak0', '123'),
('dissojak1', '123');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(20) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cin` int(8) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `role` varchar(20) NOT NULL,
  `placeRes` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `pr`, `cin`, `adresse`, `tel`, `role`, `placeRes`, `username`) VALUES
('ben amor', 'adem', 14418248, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'owner', NULL, 'dissojak1'),
('ben amor', 'adem', 14418249, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'user', 1325669656, 'dissojak'),
('ben amor', 'adem', 14418266, 'Maamoura , nahej chahid mouhamed zgued', 23039320, 'user', NULL, 'dissojak0');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `mat` int(11) NOT NULL,
  `cin` int(8) NOT NULL,
  `model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`mat`, `cin`, `model`) VALUES
(12365478, 14418248, 'xxx'),
(14785236, 14418266, 'bmw'),
(1325669656, 14418248, 'golf 6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idlocation`),
  ADD KEY `FK4` (`mat`),
  ADD KEY `FK3` (`Cin`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `FK5` (`username`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`mat`),
  ADD KEY `FK1` (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`Cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`mat`) REFERENCES `voiture` (`mat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
