-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 20 mai 2019 à 12:37
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simplon_civ`
--

-- --------------------------------------------------------

--
-- Structure de la table `simplonien`
--

CREATE TABLE `simplonien` (
  `id` int(4) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numTel` varchar(8) NOT NULL,
  `sexe` text NOT NULL,
  `heure_arriv` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `simplonien`
--

INSERT INTO `simplonien` (`id`, `nom`, `prenom`, `email`, `numTel`, `sexe`, `heure_arriv`) VALUES
(19, 'Eponou', 'Felicia ', 'fliciaroselinestaxy2@gmail.com', '09682009', 'F', ''),
(20, 'aklade', 'kouassi sosthene', 'jkomenan@julaya.co', '59839080', 'M', '10:05:44'),
(21, 'kakro', 'kokora', 'lone.samuel@yahoo.fr', '88144835', 'M', '10:35:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `simplonien`
--
ALTER TABLE `simplonien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `simplonien`
--
ALTER TABLE `simplonien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
