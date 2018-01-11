-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Décembre 2017 à 10:36
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `desbieysm_BioRelais_MMI`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADHERENT`
--

CREATE TABLE `ADHERENT` (
  `ID` char(32) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `ADRESSE` char(32) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  `MDP` varchar(15) NOT NULL,
  `STATUT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
  `NUM` char(32) NOT NULL,
  `ANNEE` char(32) NOT NULL,
  `SEMAINE` char(32) NOT NULL,
  `ID` char(32) NOT NULL,
  `ETAT` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `CONTENIR`
--

CREATE TABLE `CONTENIR` (
  `NUM` char(32) NOT NULL,
  `ID` char(32) NOT NULL,
  `QUANTITE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `DATE`
--

CREATE TABLE `DATE` (
  `ANNEE` char(32) NOT NULL,
  `SEMAINE` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PERSONNE`
--

CREATE TABLE `PERSONNE` (
  `ID` char(32) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `ADRESSE` char(32) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `STATUT` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `PERSONNE`
--

INSERT INTO `PERSONNE` (`ID`, `NOM`, `ADRESSE`, `MAIL`, `PASSWORD`, `STATUT`) VALUES
('mdesbieys', 'Desbieys', '90 rue raymond Lavigne', 'desbieysmaxime@gmail.com', 'mdesbieys', '1');

-- --------------------------------------------------------

--
-- Structure de la table `PRODUCTEUR`
--

CREATE TABLE `PRODUCTEUR` (
  `ID` char(32) NOT NULL,
  `DESCRIPTIF` char(32) DEFAULT NULL,
  `NOM` char(32) DEFAULT NULL,
  `ADRESSE` char(32) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PRODUIT`
--

CREATE TABLE `PRODUIT` (
  `ID` char(32) NOT NULL,
  `ID_PRODUCTEUR` char(32) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `DESCRIPTIF` char(32) DEFAULT NULL,
  `UNITE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `VENDRE`
--

CREATE TABLE `VENDRE` (
  `ID` char(32) NOT NULL,
  `ANNEE` char(32) NOT NULL,
  `SEMAINE` char(32) NOT NULL,
  `QUANTITE` char(32) DEFAULT NULL,
  `PRIX` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ADHERENT`
--
ALTER TABLE `ADHERENT`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD PRIMARY KEY (`NUM`),
  ADD KEY `I_FK_COMMANDE_ADHERENT` (`ID`),
  ADD KEY `I_FK_COMMANDE_DATE` (`ANNEE`,`SEMAINE`);

--
-- Index pour la table `CONTENIR`
--
ALTER TABLE `CONTENIR`
  ADD PRIMARY KEY (`NUM`,`ID`),
  ADD KEY `I_FK_CONTENIR_COMMANDE` (`NUM`),
  ADD KEY `I_FK_CONTENIR_PRODUIT` (`ID`);

--
-- Index pour la table `DATE`
--
ALTER TABLE `DATE`
  ADD PRIMARY KEY (`ANNEE`,`SEMAINE`);

--
-- Index pour la table `PERSONNE`
--
ALTER TABLE `PERSONNE`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `PRODUCTEUR`
--
ALTER TABLE `PRODUCTEUR`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `PRODUIT`
--
ALTER TABLE `PRODUIT`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `I_FK_PRODUIT_PRODUCTEUR` (`ID_PRODUCTEUR`);

--
-- Index pour la table `VENDRE`
--
ALTER TABLE `VENDRE`
  ADD PRIMARY KEY (`ID`,`ANNEE`,`SEMAINE`),
  ADD KEY `I_FK_VENDRE_PRODUIT` (`ID`),
  ADD KEY `I_FK_VENDRE_DATE` (`ANNEE`,`SEMAINE`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ADHERENT`
--
ALTER TABLE `ADHERENT`
  ADD CONSTRAINT `FK_ADHERENT_PERSONNE` FOREIGN KEY (`ID`) REFERENCES `PERSONNE` (`ID`);

--
-- Contraintes pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD CONSTRAINT `FK_COMMANDE_ADHERENT` FOREIGN KEY (`ID`) REFERENCES `ADHERENT` (`ID`),
  ADD CONSTRAINT `FK_COMMANDE_DATE` FOREIGN KEY (`ANNEE`,`SEMAINE`) REFERENCES `DATE` (`ANNEE`, `SEMAINE`);

--
-- Contraintes pour la table `CONTENIR`
--
ALTER TABLE `CONTENIR`
  ADD CONSTRAINT `FK_CONTENIR_COMMANDE` FOREIGN KEY (`NUM`) REFERENCES `COMMANDE` (`NUM`),
  ADD CONSTRAINT `FK_CONTENIR_PRODUIT` FOREIGN KEY (`ID`) REFERENCES `PRODUIT` (`ID`);

--
-- Contraintes pour la table `PRODUCTEUR`
--
ALTER TABLE `PRODUCTEUR`
  ADD CONSTRAINT `FK_PRODUCTEUR_PERSONNE` FOREIGN KEY (`ID`) REFERENCES `PERSONNE` (`ID`);

--
-- Contraintes pour la table `PRODUIT`
--
ALTER TABLE `PRODUIT`
  ADD CONSTRAINT `FK_PRODUIT_PRODUCTEUR` FOREIGN KEY (`ID_PRODUCTEUR`) REFERENCES `PRODUCTEUR` (`ID`);

--
-- Contraintes pour la table `VENDRE`
--
ALTER TABLE `VENDRE`
  ADD CONSTRAINT `FK_VENDRE_DATE` FOREIGN KEY (`ANNEE`,`SEMAINE`) REFERENCES `DATE` (`ANNEE`, `SEMAINE`),
  ADD CONSTRAINT `FK_VENDRE_PRODUIT` FOREIGN KEY (`ID`) REFERENCES `PRODUIT` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
