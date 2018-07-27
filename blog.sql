-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Juin 2018 à 17:27
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `author`, `created_at`, `update_at`, `title`, `content`, `category_id`) VALUES
(1, 1, '2018-06-08 16:40:11', '2018-06-08 16:40:11', 'Recette de tartelette aux pommes', 'pour faire une tartelette aux pommes, il faut des pommes, du beurre ....', 2),
(2, 2, '2018-06-08 16:45:11', '2018-06-08 16:45:11', 'Recette de purée de brocolis', 'Mixer les brocolis avec la creme et c\'est fini ', 1),
(3, 2, '2018-06-11 00:00:00', '2018-06-11 00:00:00', 'Mousse au chocolat', 'battez les oeufs et le chocolat et c\'est pret', 2),
(4, 1, '2018-06-11 16:40:47', '2018-06-11 16:40:47', 'Tarte au concombre', 'c\'est pas bon ! ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Victoire', 'RABILLER', 'vic@vic.fr', 'ezrezrez'),
(2, 'Antony', 'RABILLER', 'antony@antony.fr', 'efrezrtez');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'patisserie'),
(2, 'cuisine du monde');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `created_at`, `pseudo`, `content`, `article_id`) VALUES
(1, '2018-06-11 00:00:00', 'Toto', 'feztmeazmtrzqmtg mez vfameZKFAÙMEKfgùa', 1),
(2, '2018-06-11 00:00:00', 'Toto', 'feztmeazmtrzqmtg mez vfameZKFAÙMEKfgùa', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
