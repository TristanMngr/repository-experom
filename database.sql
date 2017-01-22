-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 22 Janvier 2017 à 14:35
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

--
-- Contenu de la table `archives`
--

INSERT INTO `archives` (`ID`, `numero`, `temperature`, `humidite`, `date`, `ID_capteur`) VALUES
(41, 2, 42, 0, '0000-00-00', 41),
(42, 3, 24, 0, '0000-00-00', 42),
(43, 5, 0, 43, '0000-00-00', 43),
(44, 2, 0, 26, '0000-00-00', 44);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `serial_key` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ID_salle` int(11) NOT NULL,
  `ID_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `capteurs`
--

INSERT INTO `capteurs` (`ID`, `type`, `serial_key`, `nom`, `ID_salle`, `ID_maison`) VALUES
(41, 'temperature', 302, 'cuisine', 64, 1),
(42, 'temperature', 303, 'cuisine', 63, 1),
(43, 'humidite', 405, 'chambre', 0, 1),
(44, 'humidite', 402, 'salle5', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cgu`
--

CREATE TABLE `cgu` (
  `ID` int(11) NOT NULL,
  `text` text NOT NULL,
  `last_update` date NOT NULL,
  `last_admin` varchar(255) NOT NULL
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

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`ID`, `nom`, `superficie`, `adresse`) VALUES
(1, 'maison1', 140, 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `modes`
--

CREATE TABLE `modes` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `IDmaison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modes`
--

INSERT INTO `modes` (`ID`, `nom`, `IDmaison`) VALUES
(2, 'mode jour', -1),
(3, 'mode nuit', -1);

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

--
-- Contenu de la table `modes_config`
--

INSERT INTO `modes_config` (`ID`, `type`, `consigne`, `heure_debut`, `heure_fin`, `ID_mode`) VALUES
(3, 'temperature', 22, 6, 22, 2),
(4, 'humidite', 45, 22, 6, 2),
(5, 'temperature', 19, 22, 6, 3),
(6, 'humidite', 50, 6, 22, 3);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `isTemperature` tinyint(1) NOT NULL,
  `IDmaison` int(11) NOT NULL,
  `isHumidite` tinyint(1) NOT NULL,
  `ID_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`ID`, `nom`, `isTemperature`, `IDmaison`, `isHumidite`, `ID_mode`) VALUES
(63, 'salle bain', 1, 1, 0, 0),
(64, 'cuisine', 1, 1, 0, 0);

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
(1, 'admin', 'admin', '', '', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-21', 'admin', -1),
(2, 'tristan', 'menager', 'tristanmenager@gmail.com', '0650020454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-16', 'principal', 1);

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
-- Index pour la table `cgu`
--
ALTER TABLE `cgu`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `modes`
--
ALTER TABLE `modes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `modes_config`
--
ALTER TABLE `modes_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;