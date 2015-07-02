-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 07 Juin 2015 à 18:19
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bduma`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_universitaire`
--

CREATE TABLE IF NOT EXISTS `annee_universitaire` (
`idannee` int(11) NOT NULL,
  `annee` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2018 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `annee_universitaire`
--

INSERT INTO `annee_universitaire` (`idannee`, `annee`) VALUES
(2015, 2015),
(2016, 2016),
(2017, 2017);

-- --------------------------------------------------------

--
-- Structure de la table `authentif`
--

CREATE TABLE IF NOT EXISTS `authentif` (
  `login` varchar(8) COLLATE utf8_bin NOT NULL,
  `password` varchar(8) COLLATE utf8_bin NOT NULL,
  `module` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `chparcours`
--

CREATE TABLE IF NOT EXISTS `chparcours` (
  `id` varchar(45) COLLATE utf8_bin NOT NULL,
  `codedem` int(5) NOT NULL,
  `section_actuelle` int(11) NOT NULL,
  `niveau_actuelle` enum('1ere année','2eme année','3eme année') COLLATE utf8_bin DEFAULT NULL,
  `section_demande` int(11) NOT NULL,
  `niveau_demande` enum('1ere année','2eme année','3eme année') COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
`codedem` int(5) NOT NULL,
  `type_demande` enum('Reorentation','Mutation','Changment de parcours','Retrait d''inscription','Report') COLLATE utf8_bin NOT NULL,
  `annee_universitaire` int(11) NOT NULL,
  `CIN` int(8) NOT NULL,
  `etat` enum('En attente','Refuser','Accepter') COLLATE utf8_bin DEFAULT 'En attente',
  `descriptif` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_demande` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55779 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`codedem`, `type_demande`, `annee_universitaire`, `CIN`, `etat`, `descriptif`, `date_demande`) VALUES
(55778, 'Reorentation', 2015, 7431458, 'En attente', NULL, '2015-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `detailconsultproc`
--

CREATE TABLE IF NOT EXISTS `detailconsultproc` (
  `cin` int(8) NOT NULL,
  `codeproclm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL,
  `denomination` varchar(20) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(100) COLLATE utf8_bin NOT NULL,
  `numtel` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`codeetab`, `denomination`, `adresse`, `numtel`) VALUES
('CENS', 'ESI', '', 0),
('CESC4', 'ESCT', '', 0),
('CESE1', 'Université Mannouba', 'Université Mannouba', 71333444),
('CFLA5', 'FLAH', '', 0),
('CIPS7', 'IPSI', '', 0),
('CISC3', 'ISCAE', '', 0),
('CISD8', 'ISD', '', 0),
('CISM', 'ISAMM', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
`cin` int(8) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `datenaiss` date NOT NULL,
  `lieunaiss` varchar(10) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `pays` varchar(10) COLLATE utf8_bin NOT NULL,
  `nationalite` varchar(10) COLLATE utf8_bin NOT NULL,
  `genre` tinyint(4) NOT NULL,
  `adresse` varchar(30) COLLATE utf8_bin NOT NULL,
  `codpostal` int(4) NOT NULL,
  `numtel` int(8) NOT NULL,
  `annebac` int(4) NOT NULL,
  `branche` enum('Math','Technique','Sc.expérimentales','Lettres','Informatique') COLLATE utf8_bin NOT NULL,
  `session` enum('Principal','Contrôle') COLLATE utf8_bin NOT NULL,
  `mention` enum('Moyen','Assez Bien','Bien','Très Bien') COLLATE utf8_bin NOT NULL,
  `etablissement` varchar(20) COLLATE utf8_bin NOT NULL,
  `specialite` varchar(20) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(10) COLLATE utf8_bin NOT NULL,
  `situationuniv` varchar(10) COLLATE utf8_bin NOT NULL,
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL,
  `codeins` int(11) DEFAULT NULL,
  `login` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `actif` enum('Oui','Non') COLLATE utf8_bin NOT NULL,
  `userapprouvee` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80776693 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `nom`, `prenom`, `datenaiss`, `lieunaiss`, `ville`, `pays`, `nationalite`, `genre`, `adresse`, `codpostal`, `numtel`, `annebac`, `branche`, `session`, `mention`, `etablissement`, `specialite`, `niveau`, `situationuniv`, `codeetab`, `codeins`, `login`, `password`, `actif`, `userapprouvee`) VALUES
(7431458, 'ferchichi', 'imen', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666673, NULL, NULL, '', NULL),
(8972364, 'islem', 'ben hlel', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666671, NULL, NULL, '', NULL),
(8976566, 'kortas', 'Abdellatif', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', '', '', 'CESE1', 666680, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
`codeins` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cinins` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `login` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `motdepasse` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=666681 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `mutation`
--

CREATE TABLE IF NOT EXISTS `mutation` (
  `id` int(11) NOT NULL,
  `codedem` int(5) NOT NULL,
  `ville` int(11) NOT NULL,
  `section_actuelle` text COLLATE utf8_bin,
  `niveau_actuelle` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `resultat` enum('admis','redoublant') COLLATE utf8_bin NOT NULL,
  `description_sanction` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `autres` varchar(255) COLLATE utf8_bin NOT NULL,
  `section_demande` int(11) NOT NULL,
  `etablissement_demande` varchar(5) COLLATE utf8_bin NOT NULL,
  `cause` enum('Sante','Social','Autres') COLLATE utf8_bin NOT NULL,
  `type_sanction` enum('Non','Oui') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
`id` int(11) NOT NULL,
  `code` varchar(5) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(20) COLLATE utf8_bin NOT NULL,
  `diplome` varchar(20) COLLATE utf8_bin NOT NULL,
  `specialite` varchar(20) COLLATE utf8_bin NOT NULL,
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`id`, `code`, `niveau`, `diplome`, `specialite`, `codeetab`) VALUES
(1, 'ces1', 'licence', 'LFG Finance', 'finance', 'CESC4'),
(2, 'ces2', 'licence', 'LFG  Marketing', 'marketing', 'CESC4'),
(3, 'ces3', 'licence', 'LFG Management', 'management', 'CESC4'),
(4, 'ces4', 'licence', 'licence fondamentale', 'economie', 'CESC4'),
(5, 'ces5', 'licence', 'licence fondamentale', 'LFIAG', 'CESC4'),
(6, 'ces6', 'licence', 'LAG (marketing) VNC', 'marketing', 'CESC4'),
(7, 'ces7', 'licence', 'LAG (finance) GIF', 'finance', 'CESC4'),
(8, 'ces8', 'licence', 'LAG (management) GHT', 'management', 'CESC4'),
(9, 'ces9', 'licence', 'LAE TCI', 'economie', 'CESC4'),
(10, 'cpe1', 'licence', 'licence appliquee en', 'e commerce', 'CESE1'),
(11, 'cpe2', 'licence', 'licence appliquee en', 'TSI', 'CESE1'),
(12, 'cpe3', 'licence', 'licence fondamentale', 'LFIAG', 'CESE1'),
(13, 'cpe4', 'mastere', 'mastere de recherche', 'web intelligence', 'CESE1'),
(14, 'cpe5', 'mastere', 'mastere professionne', 'MBDS', 'CESE1'),
(15, 'cpe6', 'mastere', 'mastere professionne', 'e commerce', 'CESE1'),
(16, 'cpe7', 'mastere', 'mastere professionne', 'VIC', 'CESE1'),
(17, 'cpi1', 'licence', 'licence informatique', 'informatique multime', 'CISC3'),
(18, 'cpi2', 'licence', 'licence en communica', 'communication multim', 'CISC3'),
(19, 'cpi3', 'licence', 'licence en audio vis', 'audio visuel', 'CISC3'),
(20, 'cpi4', 'mastere', 'mastere professionne', '', 'CISC3'),
(21, 'cpi5', 'mastere', 'mastere de recherche', '', 'CISC3'),
(22, 'cpi6', 'cycle ingenierie', '', '', 'CISC3');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
`idpersonnel` int(6) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `cin` int(8) NOT NULL,
  `adresse` varchar(30) COLLATE utf8_bin NOT NULL,
  `numtel` int(8) NOT NULL,
  `Titre` varchar(20) COLLATE utf8_bin NOT NULL,
  `organisme` varchar(20) COLLATE utf8_bin NOT NULL,
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL,
  `login` varchar(8) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80001 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `proclamation`
--

CREATE TABLE IF NOT EXISTS `proclamation` (
`codeproclm` int(5) NOT NULL,
  `typeproclm` varchar(10) COLLATE utf8_bin NOT NULL,
  `decision` varchar(40) COLLATE utf8_bin NOT NULL,
  `idpersonnel` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reorientation`
--

CREATE TABLE IF NOT EXISTS `reorientation` (
`id` int(11) NOT NULL,
  `codedem` int(5) NOT NULL,
  `ville` int(11) NOT NULL,
  `etablissement_actuelle` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `section_actuelle` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `resultat` enum('admis','redoublant') COLLATE utf8_bin NOT NULL,
  `etablissement_demande` varchar(5) COLLATE utf8_bin NOT NULL,
  `section_demande` int(11) NOT NULL,
  `date_demande` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `reorientation`
--

INSERT INTO `reorientation` (`id`, `codedem`, `ville`, `etablissement_actuelle`, `section_actuelle`, `resultat`, `etablissement_demande`, `section_demande`, `date_demande`) VALUES
(1, 55778, 1, 'ISSAT', 'Infor', 'admis', 'CENS', 17, '2015-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
`idville` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`idville`, `libelle`, `sort_order`) VALUES
(1, 'Ariana', NULL),
(2, 'Beja', NULL),
(3, 'Ben Arous', NULL),
(4, 'Bizerte', NULL),
(5, 'Gabes', NULL),
(6, 'Gafsa', NULL),
(7, 'Jendouba', NULL),
(8, 'Kairouan', NULL),
(9, 'Kasserine', NULL),
(10, 'Kebili', NULL),
(11, 'Kef', NULL),
(12, 'Mahdia', NULL),
(13, 'Mannouba', NULL),
(14, 'Medenine', NULL),
(15, 'Monastir', NULL),
(16, 'Nabeul', NULL),
(17, 'Sfax', NULL),
(18, 'Sidi Bouzid', NULL),
(19, 'Siliana', NULL),
(20, 'Sousse', NULL),
(21, 'Tataouine', NULL),
(22, 'Tozeur', NULL),
(23, 'Tunis', NULL),
(24, 'Zaghouan', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annee_universitaire`
--
ALTER TABLE `annee_universitaire`
 ADD PRIMARY KEY (`idannee`);

--
-- Index pour la table `authentif`
--
ALTER TABLE `authentif`
 ADD PRIMARY KEY (`login`);

--
-- Index pour la table `chparcours`
--
ALTER TABLE `chparcours`
 ADD PRIMARY KEY (`id`,`codedem`), ADD KEY `codedem` (`codedem`), ADD KEY `fk_chparcours_parcours1_idx` (`section_actuelle`), ADD KEY `fk_chparcours_parcours2_idx` (`section_demande`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
 ADD PRIMARY KEY (`codedem`), ADD KEY `cin` (`CIN`), ADD KEY `fk_demande_Annee_universitaire1_idx` (`annee_universitaire`);

--
-- Index pour la table `detailconsultproc`
--
ALTER TABLE `detailconsultproc`
 ADD PRIMARY KEY (`cin`,`codeproclm`), ADD KEY `cin` (`cin`), ADD KEY `codeproclm` (`codeproclm`), ADD KEY `codeproclm_2` (`codeproclm`), ADD KEY `codeproclm_3` (`codeproclm`), ADD KEY `codeproclm_4` (`codeproclm`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
 ADD PRIMARY KEY (`codeetab`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
 ADD PRIMARY KEY (`cin`), ADD KEY `id_etud` (`cin`), ADD KEY `id_etud_2` (`cin`), ADD KEY `id_etud_3` (`cin`), ADD KEY `id_etud_4` (`cin`), ADD KEY `codeins` (`codeins`), ADD KEY `situationuniv` (`situationuniv`), ADD KEY `codeetab` (`codeetab`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
 ADD PRIMARY KEY (`codeins`);

--
-- Index pour la table `mutation`
--
ALTER TABLE `mutation`
 ADD PRIMARY KEY (`id`,`codedem`), ADD UNIQUE KEY `etablissement_demande_UNIQUE` (`etablissement_demande`), ADD KEY `fk_mutation_ville1_idx` (`ville`), ADD KEY `fk_mutation_parcours1_idx` (`section_demande`), ADD KEY `fk_mutation_etablissement1_idx` (`etablissement_demande`), ADD KEY `mutation_ibfk_1` (`codedem`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
 ADD PRIMARY KEY (`id`), ADD KEY `code_etab` (`codeetab`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
 ADD PRIMARY KEY (`idpersonnel`), ADD KEY `code_etab` (`codeetab`), ADD KEY `login` (`login`);

--
-- Index pour la table `proclamation`
--
ALTER TABLE `proclamation`
 ADD PRIMARY KEY (`codeproclm`), ADD KEY `idpersonnel` (`idpersonnel`);

--
-- Index pour la table `reorientation`
--
ALTER TABLE `reorientation`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_reorientation_ville1` (`ville`), ADD KEY `fk_reorientation_parcours1_idx` (`section_demande`), ADD KEY `fk_reorientation_etablissement1_idx` (`etablissement_demande`), ADD KEY `reorientation_ibfk_1` (`codedem`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
 ADD PRIMARY KEY (`idville`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annee_universitaire`
--
ALTER TABLE `annee_universitaire`
MODIFY `idannee` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2018;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
MODIFY `codedem` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55779;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
MODIFY `cin` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80776693;
--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
MODIFY `codeins` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=666681;
--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
MODIFY `idpersonnel` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80001;
--
-- AUTO_INCREMENT pour la table `proclamation`
--
ALTER TABLE `proclamation`
MODIFY `codeproclm` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reorientation`
--
ALTER TABLE `reorientation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
MODIFY `idville` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chparcours`
--
ALTER TABLE `chparcours`
ADD CONSTRAINT `chparcours_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`),
ADD CONSTRAINT `fk_chparcours_parcours1` FOREIGN KEY (`section_actuelle`) REFERENCES `parcours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_chparcours_parcours2` FOREIGN KEY (`section_demande`) REFERENCES `parcours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `etudiant` (`cin`),
ADD CONSTRAINT `fk_demande_Annee_universitaire1` FOREIGN KEY (`annee_universitaire`) REFERENCES `annee_universitaire` (`idannee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `detailconsultproc`
--
ALTER TABLE `detailconsultproc`
ADD CONSTRAINT `detailconsultproc_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `etudiant` (`cin`),
ADD CONSTRAINT `detailconsultproc_ibfk_2` FOREIGN KEY (`codeproclm`) REFERENCES `proclamation` (`codeproclm`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`codeetab`) REFERENCES `etablissement` (`codeetab`);

--
-- Contraintes pour la table `mutation`
--
ALTER TABLE `mutation`
ADD CONSTRAINT `fk_mutation_etablissement1` FOREIGN KEY (`etablissement_demande`) REFERENCES `etablissement` (`codeetab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_mutation_parcours1` FOREIGN KEY (`section_demande`) REFERENCES `parcours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_mutation_ville1` FOREIGN KEY (`ville`) REFERENCES `ville` (`idville`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `mutation_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`login`) REFERENCES `authentif` (`login`);

--
-- Contraintes pour la table `proclamation`
--
ALTER TABLE `proclamation`
ADD CONSTRAINT `proclamation_ibfk_1` FOREIGN KEY (`idpersonnel`) REFERENCES `personnel` (`idpersonnel`);

--
-- Contraintes pour la table `reorientation`
--
ALTER TABLE `reorientation`
ADD CONSTRAINT `fk_reorientation_etablissement1` FOREIGN KEY (`etablissement_demande`) REFERENCES `etablissement` (`codeetab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reorientation_parcours1` FOREIGN KEY (`section_demande`) REFERENCES `parcours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_reorientation_ville1` FOREIGN KEY (`ville`) REFERENCES `ville` (`idville`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `reorientation_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
