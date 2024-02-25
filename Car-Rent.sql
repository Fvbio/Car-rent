-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 25 fév. 2024 à 17:05
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Car-Rent`
--

-- --------------------------------------------------------

--
-- Structure de la table `Images`
--

CREATE TABLE `Images` (
  `id_vehicule` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Reservations`
--

CREATE TABLE `Reservations` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_voiture` int(11) DEFAULT NULL,
  `DateReservationDebut` date DEFAULT NULL,
  `DateReservationFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Reservations`
--

INSERT INTO `Reservations` (`id`, `id_user`, `id_voiture`, `DateReservationDebut`, `DateReservationFin`) VALUES
(11, 5, 1, '2024-02-25', '2024-02-26'),
(12, 5, 1, '2024-02-28', '2024-02-29'),
(13, 5, 1, '2024-04-17', '2024-05-09'),
(14, 5, 1, '2024-12-01', '2025-01-03'),
(17, 5, 4, '2024-02-25', '2024-02-28'),
(19, 5, 3, '2024-03-24', '2024-02-25');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES
(1, 'Smith', 'John', 'john@carent.com', 'password123'),
(2, 'Doe', 'Jane', 'jane@carent.com', 'pass1234'),
(3, 'Johnson', 'Michael', 'michael@carent.com', 'securepwd'),
(4, 'Williams', 'Emily', 'emily@carent.com', 'password456'),
(5, 'Admin', 'Admin', 'a@a', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `Voitures`
--

CREATE TABLE `Voitures` (
  `id` int(11) NOT NULL,
  `Marque` varchar(100) DEFAULT NULL,
  `Modele` varchar(100) DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `Couleur` varchar(50) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Voitures`
--

INSERT INTO `Voitures` (`id`, `Marque`, `Modele`, `Annee`, `Couleur`, `Prix`) VALUES
(1, 'Audi', 'A5', 2022, 'Noir', 90),
(2, 'BMW', 'Serie_3', 2021, 'Blanc', 90),
(3, 'Toyota', 'RAV4', 2020, 'Gris', 110),
(4, 'Mercedes', 'Classe_C', 2023, 'Bleu', 120);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Images`
--
ALTER TABLE `Images`
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_voiture` (`id_voiture`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Voitures`
--
ALTER TABLE `Voitures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Voitures`
--
ALTER TABLE `Voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Images`
--
ALTER TABLE `Images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `Voitures` (`id`);

--
-- Contraintes pour la table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_voiture`) REFERENCES `Voitures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
