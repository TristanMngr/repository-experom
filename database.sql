-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mar 06 Décembre 2016 à 23:58
-- Version du serveur :  5.6.28
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `experom`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dateInscription` date NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userID`, `nom`, `mail`, `adresse`, `mdp`, `dateInscription`, `role`) VALUES
(1, 'menager', 'tristanmenager', 'rue', 'cocos', '2016-12-06', 'principal'),
(2, 'Marion', 'marion-elodie.langlois@laposte.net', 'rue', 'framboise', '2016-12-06', 'secondaire'),
(3, 'cocos', 'cocos', 'rue', 'cocos', '2016-12-06', 'secondaire'),
(4, 'pomme', 'pomme', 'pomme', 'pomme', '2016-12-06', 'principal'),
(5, 'flop', 'flop@gmail.com', 'flop', 'flop', '2016-12-06', 'principal'),
(6, 'flopy', 'flopy', 'flop', 'flopy', '2016-12-06', 'secondaire'),
(7, 'flopflop', 'flopflop', 'flop', 'flopflop', '2016-12-06', 'secondaire'),
(8, 'trop', 'torp', 'flop', 'trop', '2016-12-06', 'secondaire');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;