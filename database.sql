-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 09 Janvier 2017 à 23:27
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
(1, 1, 19, 0, '0000-00-00', 2),
(2, 1, 0, 45, '0000-00-00', 1),
(3, 6, 24, 0, '0000-00-00', 4),
(4, 3, 0, 45, '0000-00-00', 3),
(5, 6, 24, 0, '0000-00-00', 6),
(6, 1, 0, 45, '0000-00-00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ID_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `capteurs`
--

INSERT INTO `capteurs` (`ID`, `type`, `ID_salle`) VALUES
(1, 'humidite', 1),
(2, 'temperature', 1),
(3, 'humidite', 2),
(4, 'temperature', 2),
(5, 'humidite', 3),
(6, 'temperature', 3);

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
(14, 'chocolat', 130, '14 rue saint la');

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
(-2, 'mode nuit', -1),
(-1, 'mode jour', -1),
(37, 'mode 1', 14),
(38, 'mode 2', 14);

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
(-4, 'humidite', 45, 1, 24, -2),
(-3, 'temperature', 19, 22, 6, -2),
(-2, 'humidite', 45, 1, 24, -1),
(-1, 'temperature', 24, 6, 22, -1),
(41, 'temperature', 14, 17, 19, 37),
(42, 'humidite', 45, 18, 13, 37),
(43, 'temperature', 15, 4, 16, 38),
(44, 'humidite', 50, 17, 14, 38);

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
(1, 'cuisine', 1, 14, 1, -2),
(3, 'salle2', 1, 14, 1, -1);

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
(1, 'tristan', 'menager', 'tristanmenager@gmail.com', '0650020454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-09', 'principal', 14),
(4, 'tristansecondaire', 'menager', 'tristanmenager@gmail.com', '0650020454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-09', 'secondaire', 14);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `modes`
--
ALTER TABLE `modes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `modes_config`
--
ALTER TABLE `modes_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;