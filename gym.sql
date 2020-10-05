-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 01 sep. 2020 à 11:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Base de données :  `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings`
(
  `id` int
(11) NOT NULL,
  `duration` varchar
(30) NOT NULL,
  `payment` varchar
(30) NOT NULL,
  `user_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `coaching`
--

CREATE TABLE `coaching`
(
  `id` int
(11) NOT NULL,
  `date` date NOT NULL,
  `slot` varchar
(30) NOT NULL,
  `coach` varchar
(30) NOT NULL,
  `user_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coaching`
--

INSERT INTO `coaching` (`
id`,
`date
`, `slot`, `coach`, `user_id`) VALUES
(2, '2020-09-01', '9h00', 'Marc', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions`
(
  `id` int
(11) NOT NULL,
  `activity` varchar
(30) NOT NULL,
  `user_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users`
(
  `id` int
(30) NOT NULL,
  `email` varchar
(100) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `firstName` varchar
(100) NOT NULL,
  `lastName` varchar
(100) NOT NULL,
  `role` varchar
(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`
id`,
`email
`, `password`, `firstName`, `lastName`, `role`) VALUES
(1, 'test@gmail.com', '$2y$11$b28a36d7d84ba1e279025ueyK3QX7wGvKhHNwacYw29LpLLe0vKKu', 'test', 'test', 'user'),
(2, 'fake@gmail.com', '$2y$11$4aafba17e273dbc9e0d02uCzsPwGycRa..BoW5dmt3zMmOW1gzSr.', 'fake', 'fake', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `coaching`
--
ALTER TABLE `coaching`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
ADD PRIMARY KEY
(`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `coaching`
--
ALTER TABLE `coaching`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int
(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;