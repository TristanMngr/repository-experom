-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 02 Janvier 2017 à 23:20
-- Version du serveur :  5.6.28
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `experomV2`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE `archives` (
  `ID` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `temperature` int(11) NOT NULL,
  `humidite` int(11) NOT NULL,
  `date` date NOT NULL,
  `ID_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ID_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `superficie` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modes`
--

CREATE TABLE `modes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `IDmaison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modes_config`
--

CREATE TABLE `modes_config` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `consigne` int(11) NOT NULL,
  `heure_debut` int(11) NOT NULL,
  `heure_fin` int(11) NOT NULL,
  `ID_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `isTemperature` tinyint(1) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `isHumidite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables exportées
--

--
-- Index pour la table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `modes`
--
ALTER TABLE `modes`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `modes_config`
--
ALTER TABLE `modes_config`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `archives`
--
ALTER TABLE `archives`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modes`
--
ALTER TABLE `modes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modes_config`
--
ALTER TABLE `modes_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;