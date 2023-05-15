-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mai 2023 à 20:28
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
  `prix` int(3) NOT NULL,
  `datedepare` datetime NOT NULL,
  `villedepare` varchar(20) NOT NULL,
  `villefin` varchar(20) NOT NULL,
  `Cin` int(11) NOT NULL,
  `idowner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('ademlkbirr', '123'),
('adem_ben_amor10', '123'),
('dissojak', '123'),
('dissojakaaaa', '123'),
('EMNA', '123'),
('nightloverrr', '123'),
('nightloverrraa', '123'),
('stoon', '123'),
('stoonadem', '123'),
('stoonthe1', '123'),
('tarak', '123'),
('tarak1', '123');

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

CREATE TABLE `owner` (
  `idOwner` int(11) NOT NULL,
  `cin` int(8) NOT NULL,
  `place_dispo` int(1) NOT NULL,
  `model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `owner`
--

INSERT INTO `owner` (`idOwner`, `cin`, `place_dispo`, `model`) VALUES
(1, 82467913, 3, 'golf 6'),
(2, 98765432, 4, 'bmw x8'),
(3, 14418245, 2, 'audi a6'),
(4, 15935746, 4, 'golf 6');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom` varchar(20) NOT NULL,
  `pr` varchar(20) NOT NULL,
  `cin` int(8) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom`, `pr`, `cin`, `adresse`, `role`, `username`) VALUES
('ben amor', 'adem', 12345674, 'Maamoura , nahej chahid mouhamed zgued', 'user', 'dissojakaaaa'),
('ben amor', 'adem', 14418245, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'ademlkbirr'),
('emna', 'gmati', 14418248, 'bouargoub', 'owner', 'EMNA'),
('ben amor', 'adem', 14418249, 'nahej chahid ...', 'user', 'dissojak'),
('ben amor', 'adem', 14785236, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'stoonadem'),
('tarak ', 'ezaeza', 15935746, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'tarak1'),
('ben amor', 'adem', 51664545, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'nightloverrraa'),
('ben amor', 'adem', 82467913, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'adem_ben_amor10'),
('ben amor', 'adem', 95195123, 'Maamoura , nahej chahid mouhamed zgued', 'user', 'nightloverrr'),
('ben amor', 'adem', 98765432, 'Maamoura , nahej chahid mouhamed zgued', 'owner', 'stoonthe1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idlocation`),
  ADD KEY `FK4` (`idowner`),
  ADD KEY `FK3` (`Cin`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`idOwner`),
  ADD KEY `FK1` (`cin`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `FK5` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `owner`
--
ALTER TABLE `owner`
  MODIFY `idOwner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`Cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`idowner`) REFERENCES `owner` (`idOwner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`cin`) REFERENCES `user` (`cin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
