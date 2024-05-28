-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 déc. 2023 à 20:30
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trotinettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `id_localisation` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id_localisation`, `id_location`, `ville`, `adresse`) VALUES
(8, 19, 'Kélibia', '36.850939, 11.121613'),
(9, 20, 'Nabeul‎', '36.451287, 10.735541'),
(10, 21, 'Tunis ', '36.808545, 10.159023'),
(11, 22, 'Bizerte', '37.276911, 9.864064'),
(12, 23, 'Béja', '36.730899, 9.176429'),
(13, 24, 'Le Kef', '36.166464, 8.700909'),
(14, 25, 'Sousse', '35.825338, 10.634196'),
(15, 26, 'Monastir', '35.764048, 10.811038'),
(16, 27, 'Mahdia', '35.511511, 11.051807'),
(17, 28, 'Sfax', '34.739545, 10.758796'),
(18, 29, 'Djerba', '33.813604, 10.843631'),
(19, 30, 'Zarzis', '33.503470, 11.088299'),
(20, 31, 'Douz ', '33.457213, 9.024886'),
(21, 32, 'Gafsa ', '34.430911, 8.775513'),
(22, 33, 'Kairouan', '35.678693, 10.098746');

-- --------------------------------------------------------

--
-- Structure de la table `trotinettes`
--

CREATE TABLE `trotinettes` (
  `id_location` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `num_serie` bigint(20) NOT NULL,
  `duree` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trotinettes`
--

INSERT INTO `trotinettes` (`id_location`, `marque`, `modele`, `num_serie`, `duree`, `date`, `heure`) VALUES
(19, 'Mercedes', 'model2015', 784512356845, 3, '2024-01-02', '18:10:00'),
(20, 'Audi', 'model2016', 897453214567, 24, '2024-01-07', '14:12:00'),
(21, 'BMW', 'model2015', 945123654785, 15, '2024-01-01', '15:16:00'),
(22, 'Silde', 'model2010', 451236785421, 48, '2024-01-06', '19:18:00'),
(23, 'Mercedes', 'model2013', 561245789654, 30, '2024-01-07', '12:20:00'),
(24, 'Silde', 'model2005', 612457896541, 40, '2024-01-08', '18:23:00'),
(25, 'BMW', 'model2007', 124578965412, 34, '2024-01-14', '16:26:00'),
(26, 'Audi', 'model2013', 230496589654, 28, '2024-01-04', '19:27:00'),
(27, 'Audi', 'model2018', 345789412589, 38, '2024-01-03', '17:30:00'),
(28, 'Mercedes', 'model2019', 521234578954, 35, '2024-01-11', '18:31:00'),
(29, 'BMW', 'model2023', 895412354783, 19, '2024-01-09', '18:34:00'),
(30, 'Silde', 'model2009', 457864521345, 72, '2024-01-15', '21:35:00'),
(31, 'Mercedes', 'model2012', 754213698745, 46, '2024-01-11', '15:38:00'),
(32, 'BMW', 'model2015', 321457965412, 58, '2024-01-16', '15:42:00'),
(33, 'Silde', 'model2011', 456125863214, 45, '2023-12-31', '21:16:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`id_localisation`),
  ADD KEY `cle_etrangere_id_localisation` (`id_location`);

--
-- Index pour la table `trotinettes`
--
ALTER TABLE `trotinettes`
  ADD PRIMARY KEY (`id_location`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `id_localisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `trotinettes`
--
ALTER TABLE `trotinettes`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `cle_etrangere_idLocalisation` FOREIGN KEY (`id_location`) REFERENCES `trotinettes` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
