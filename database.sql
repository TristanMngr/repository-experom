-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 02 Février 2017 à 16:16
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
(190, 1, 0, 50, '0000-00-00', 164),
(191, 1, 19, 0, '0000-00-00', 165),
(192, 2, 0, 50, '0000-00-00', 166),
(193, 3, 0, 50, '0000-00-00', 167);

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
(147, 'temperature', 301, 'salon', 149, 7),
(148, 'temperature', 302, 'salon', 149, 7),
(149, 'humidite', 401, 'salon', 149, 7),
(150, 'humidite', 402, 'cuisine', 150, 7),
(151, 'temperature', 303, 'cuisine', 150, 7),
(152, 'humidite', 405, 'cuisine', 151, 7),
(153, 'humidite', 407, 'cuisine', 151, 7),
(164, 'humidite', 401, 'salon', 171, 1),
(165, 'temperature', 301, 'salon', 171, 1),
(166, 'humidite', 402, 'salon', 170, 1),
(167, 'humidite', 403, 'salon', 170, 1);

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

--
-- Contenu de la table `cgu`
--

INSERT INTO `cgu` (`ID`, `text`, `last_update`, `last_admin`) VALUES
(1, 'dsgejkglmkagj', '0000-00-00', '');

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
(1, 'maison1', 140, 'paris 9'),
(2, 'tina', 140, 'paris'),
(3, 'david', 140, 'paris'),
(4, 'isep', 140, 'paris'),
(5, 'isep', 140, 'paris'),
(6, 'test', 140, 'paris'),
(7, 'paul', 100, 'paris'),
(8, 'domisep', 400, 'paris');

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
(3, 'mode nuit', -1),
(4, 'super mode', 1),
(5, 'jour et nuit', 2),
(6, 'mode jour et nuit', 3),
(7, 'mode2', 6),
(8, 'mode jour et nuit', 7);

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
(6, 'humidite', 50, 6, 22, 3),
(7, 'temperature', 20, 7, 22, 4),
(8, 'temperature', 20, 1, 24, 5),
(9, 'temperature', 20, 1, 23, 6),
(10, 'temperature', 14, 4, 7, 7),
(11, 'temperature', 20, 1, 23, 8);

-- --------------------------------------------------------

--
-- Structure de la table `oublie_mdp`
--

CREATE TABLE `oublie_mdp` (
  `ID` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oublie_mdp`
--

INSERT INTO `oublie_mdp` (`ID`, `mail`, `pseudo`, `code`) VALUES
(1, 'tristan@gmail.com', '', '2147483647'),
(2, 'domisep.contact@gmail.com', '', '9338942223'),
(3, 'domisep.contact@gmail.com', 'domisep', '0714334984'),
(4, 'tristanmenager@gmail.com', 'tristan', '2754607547'),
(5, 'tristanmenager@gmail.com', 'alexandre', '6499590093');

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
(-1, 'general', 0, -1, 0, 3),
(170, 'salon2', 0, 1, 1, 3),
(171, 'salon', 1, 1, 1, 3);

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
(2, 'tristan', 'menagerr', 'tristanmenagerr@gmail.com', '0650020457', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-16', 'principal', 1),
(3, 'junior', 'menagerr', 'tristanmenagerr@gmail.com', '0650020454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-23', 'secondaire', 1),
(4, 'tina', 'rey', 'tina@isep.fr', '0650020465', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-23', 'principal', 2),
(6, 'david', 'bo', 'david@isep.fr', '0650030405', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-23', 'principal', 3),
(7, 'test', 'test', 'test@isep.fr', '0650030456', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-23', 'principal', 5),
(8, 'test2', 'test2', 'test2@isep.fr', '0650020450', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-23', 'principal', 6),
(9, 'alexandre', 'menagerr', 'tristanmenagerr@gmail.com', '0650020457', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'secondaire', 1),
(10, 'junior2', 'menagerr', 'tristanmenagerr@gmail.com', '0650020457', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'secondaire', 1),
(11, 'paul', 'vernay', 'paul@isep.fr', '0650040304', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'principal', 7),
(12, 'paul2', 'vernay', 'paul@isep.fr', '0650040304', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'secondaire', 7),
(18, 'admin2', '', 'admin@isep.fr', '0650030465', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-26', 'admin', -1),
(19, 'domisep', 'domisep', 'domisep.contact@gmail.com', '0650030454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-28', 'principal', 8);

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
-- Index pour la table `oublie_mdp`
--
ALTER TABLE `oublie_mdp`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `modes`
--
ALTER TABLE `modes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `modes_config`
--
ALTER TABLE `modes_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `oublie_mdp`
--
ALTER TABLE `oublie_mdp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;