-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 11 avr. 2019 à 20:39
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Move'in`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `movieid`, `author`, `comment`, `date`) VALUES
(8, 550, 'Mario', 'J\'ai vraiment apprécié le film, sur le fond et la forme.', '2019-04-11 14:25:05'),
(10, 550, 'Mario', 'J\'ai vraiment apprécié le film, sur le fond et la forme.', '2019-04-11 14:29:59'),
(11, 440777, 'Coline', 'J\'ai adoré ce film mettant en avant des femmes', '2019-04-11 14:34:19'),
(12, 440777, 'emma', 'j\'ai détésté cet bouse', '2019-04-11 14:37:22'),
(31, 550, 'Mario', 'C\'est mon film préféré', '2019-04-11 16:19:46'),
(35, 322772, 'Bonsoir', 'Ceci est un des meilleur film que j\'ai eu l\'occasion de voir, une claque cinématographique, à voir absolument !!', '2019-04-11 17:04:52'),
(36, 671, 'Baptiste', 'J\'ai trouvé ce film rafraichissant et incroyablement rèche au toucher', '2019-04-11 18:49:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
