-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 02 jan. 2022 à 20:39
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fortool_v1`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `identifiant` varchar(255) NOT NULL,
  `url_pp` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mise` float NOT NULL,
  `chance` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `win` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bans`
--

CREATE TABLE `bans` (
  `id` int(11) NOT NULL,
  `date_bannissement` date NOT NULL,
  `date_debannissement` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fortool_ads`
--

CREATE TABLE `fortool_ads` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `identifiant` varchar(255) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `url_picture` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tipeeestream_v2`
--

CREATE TABLE `tipeeestream_v2` (
  `id` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT '7108d3ef925cf86dc5c3db20ca126ba7',
  `identifiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `discord` varchar(255) NOT NULL,
  `discord_username` varchar(255) NOT NULL,
  `discriminator` varchar(255) NOT NULL,
  `paypal` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL DEFAULT 'France',
  `level` int(11) NOT NULL DEFAULT 1,
  `points` int(11) NOT NULL DEFAULT 0,
  `solde` float NOT NULL DEFAULT 0,
  `newsletter` int(11) NOT NULL DEFAULT 0,
  `premium` int(11) NOT NULL DEFAULT 0,
  `staff` int(11) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utip`
--

CREATE TABLE `utip` (
  `id` int(11) NOT NULL,
  `nbr` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `euros` float NOT NULL,
  `fortcoins` float NOT NULL,
  `solde` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fortool_ads`
--
ALTER TABLE `fortool_ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tipeeestream_v2`
--
ALTER TABLE `tipeeestream_v2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utip`
--
ALTER TABLE `utip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bans`
--
ALTER TABLE `bans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fortool_ads`
--
ALTER TABLE `fortool_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tipeeestream_v2`
--
ALTER TABLE `tipeeestream_v2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utip`
--
ALTER TABLE `utip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
