-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 20 Janvier 2017 à 23:13
-- Version du serveur :  5.6.28
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `experomV2`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dateInscription` date NOT NULL,
  `role` varchar(250) NOT NULL,
  `IDmaison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `nom`, `mail`, `numero`, `mdp`, `dateInscription`, `role`, `IDmaison`) VALUES
(1, 'tristan', 'menager', 'tristanmenager@gmail.com', '0650020454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-16', 'principal', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;