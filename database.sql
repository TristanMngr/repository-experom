-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 16 Juin 2017 à 14:43
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `experom`
--

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE `archives` (
  `ID` int(11) NOT NULL,
  `type_trame` int(11) NOT NULL,
  `number_object` int(11) NOT NULL,
  `type_requete` int(11) NOT NULL,
  `type_capteur` int(11) NOT NULL,
  `number_capteur` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `number_trame` int(11) NOT NULL,
  `checksum` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `ID_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `archives`
--

INSERT INTO `archives` (`ID`, `type_trame`, `number_object`, `type_requete`, `type_capteur`, `number_capteur`, `value`, `number_trame`, `checksum`, `date_time`, `ID_capteur`) VALUES
(5215, 1, 3401, 1, 3, 7, 20, 5, 4, '2017-06-12 16:40:57', 217),
(5216, 1, 3401, 1, 3, 1, 20, 0, 45, '2017-06-12 16:43:23', 218),
(5217, 1, 3401, 1, 3, 1, 20, 0, 46, '2017-06-12 16:45:07', 218),
(5218, 1, 3401, 1, 4, 3, 33, 0, 47, '2017-06-14 09:29:01', 219),
(5219, 1, 3401, 1, 4, 1, 34, 1, 47, '2017-06-14 09:29:28', 220);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `serial_key` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `number_capteur` int(11) NOT NULL,
  `ID_salle` int(11) NOT NULL,
  `ID_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `capteurs`
--

INSERT INTO `capteurs` (`ID`, `type`, `serial_key`, `nom`, `number_capteur`, `ID_salle`, `ID_maison`) VALUES
(217, 'temperature', 37, '', 7, 1, 1),
(218, 'temperature', 31, '', 1, 1, 1),
(219, 'humidite', 43, '', 3, 1, 1),
(220, 'humidite', 41, '', 1, 1, 1);

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
(1, 'je change les CGU', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `superficie` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `number_object` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`ID`, `nom`, `superficie`, `adresse`, `number_object`) VALUES
(1, 'maison1', 140, 'paris 9', 3401),
(2, 'tina', 140, 'paris', 0),
(3, 'david', 140, 'paris', 0),
(4, 'isep', 140, 'paris', 0),
(5, 'isep', 140, 'paris', 0),
(6, 'test', 140, 'paris', 0),
(7, 'paul', 100, 'paris', 0),
(8, 'domisep', 400, 'paris', 0),
(9, '', 0, '', 3401),
(10, 'supermaison', 250, '14 avenue lazare', 3401),
(11, 'maison', 145, 'efqs', 0),
(12, 'maison', 14, '3def', 0),
(13, 'maison', 14, '3def', 0),
(14, 'dqfmlj', 143, 'dgljg', 0),
(15, 'dqfmlj', 143, 'dgljg', 0),
(16, 'aflekj', 2134, 'fmlzj', 0),
(17, 'flzaj', 134, 'qlkja', 3401),
(18, 'flzaj', 134, 'qlkja', 3401),
(19, 'qmflj', 3415, 'gmljk', 3401),
(20, 'rergljm', 45, 'gqmlkejg', 3401),
(21, 'qlmdfj', 34, 'aefjm', 9999),
(22, 'zfmkj', 145, 'dflj', 3401),
(23, 'azfkjm', 34, 'afzlkjf', 3401),
(24, 'aemkj', 1234, 'aelzfj', 3401);

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
(8, 'mode jour et nuit', 7),
(9, 'mode1', 1);

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
(11, 'temperature', 20, 1, 23, 8),
(12, 'humidite', 30, 5, 4, 9);

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
(5, 'tristanmenager@gmail.com', 'alexandre', '6499590093'),
(6, 'tristanmenagerr@gmail.com', 'tristan', '2111038538');

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
(-1, 'general', 0, -1, 0, 0),
(1, 'salon', 1, 1, 1, 2),
(2, 'general', 0, 1, 0, 0);

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
(11, 'paul', 'vernay', 'paul@isep.fr', '0650040304', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'principal', 7),
(12, 'paul2', 'vernay', 'paul@isep.fr', '0650040304', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-24', 'secondaire', 7),
(18, 'admin2', '', 'admin@isep.fr', '0650030465', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-26', 'admin', -1),
(19, 'domisep', 'domisep', 'domisep.contact@gmail.com', '0650030454', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-01-28', 'principal', 8),
(20, 'salut', 'menagerr', 'tristanmenagerr@gmail.com', '0650020457', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-02', 'secondaire', 1),
(21, 'tristan2', 'menager', 'tristanmenagerrr@gmail.com', '0605060504', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 10),
(22, 'tristan3', 'menager', 'tristanmenagerrrr@gmail.com', '0650020560', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 11),
(23, 'tristan4', 'menager', 'tristanmenagerrrrr@gmail.com', '06500205605', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 13),
(24, 'tristan5', 'menager', 'tristanmenagerrrrrr@gmail.com', '0650020563', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 15),
(25, 'tristan6', 'me', 'tristanmenagerrrrdrr@gmail.com', '0650020546', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 16),
(26, 'tristan8', 'menager', 'tristanmenagerddrr@gmail.com', '0650025465', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 18),
(27, 'tristan9', 'menager', 'tristanmenagerddddrr@gmail.com', '0650204504', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 19),
(28, 'tristan24', 'menager', 'tristanmenagerdddddrr@gmail.com', '0650405465', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 20),
(29, 'tristanM', 'menager', 'tristan@gmail.com', '0650454543', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 21),
(30, 'tristanme', 'meanger', 'tristanm@gmail.com', '0650020543', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 22),
(31, 'tristanmen', 'menager', 'tristanmena@gmail.com', '0650454542', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 23),
(32, 'tristanmenager', 'menagers', 'trsit@gmail.com', '0650045456', 'cocos_a8f391726f52e289eef056481cb8ebf8', '2017-06-14', 'principal', 24);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5220;
--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `modes`
--
ALTER TABLE `modes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `modes_config`
--
ALTER TABLE `modes_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `oublie_mdp`
--
ALTER TABLE `oublie_mdp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;