-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Juin 2015 à 00:12
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
-- Structure de la table `authentif`
--

CREATE TABLE IF NOT EXISTS `authentif` (
  `login` varchar(8) COLLATE utf8_bin NOT NULL,
  `password` varchar(8) COLLATE utf8_bin NOT NULL,
  `module` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `authentif`
--

INSERT INTO `authentif` (`login`, `password`, `module`) VALUES
('ageer', 'ageer', 'eer'),
('aguma', 'aguma', 'agent'),
('azer44', 'azer44', 'responsable'),
('pres001', 'pres001', 'responsable'),
('secte1', 'secte1', 'responsable');

-- --------------------------------------------------------

--
-- Structure de la table `chparcours`
--

CREATE TABLE IF NOT EXISTS `chparcours` (
  `codedem` int(5) NOT NULL,
  `sectionorigine` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `niveauorigine` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `sectiondem` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `niveaudem` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tel` int(8) DEFAULT NULL,
  `anneeuniv` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `chparcours`
--

INSERT INTO `chparcours` (`codedem`, `sectionorigine`, `niveauorigine`, `sectiondem`, `niveaudem`, `tel`, `anneeuniv`) VALUES
(55777, 'ecommerce', '1ere annee', 'Technologies systemes d''information', '2eme', 50787998, '2014-2015');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
`codedem` int(5) NOT NULL,
  `typedem` varchar(40) COLLATE utf8_bin NOT NULL,
  `cin` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55778 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`codedem`, `typedem`, `cin`) VALUES
(1, 'demande mutation', 7431458),
(11, 'mutation', 12345678),
(33, 'retrait', 33333333),
(222, 'reorientation', 8972364),
(11122, 'report inscription', 55667788),
(55777, 'changement de parcou', 44444444);

-- --------------------------------------------------------

--
-- Structure de la table `detailconsult`
--

CREATE TABLE IF NOT EXISTS `detailconsult` (
  `cin` int(8) NOT NULL,
  `codeparcours` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
('CESE1', 'ESEN', '', 0),
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
  `gouvernorat` varchar(10) COLLATE utf8_bin NOT NULL,
  `pays` varchar(10) COLLATE utf8_bin NOT NULL,
  `nationalite` varchar(10) COLLATE utf8_bin NOT NULL,
  `genre` tinyint(4) NOT NULL,
  `adresse` varchar(30) COLLATE utf8_bin NOT NULL,
  `codpostal` int(4) NOT NULL,
  `numtel` int(8) NOT NULL,
  `annebac` int(4) NOT NULL,
  `section` varchar(10) COLLATE utf8_bin NOT NULL,
  `session` varchar(10) COLLATE utf8_bin NOT NULL,
  `mention` varchar(10) COLLATE utf8_bin NOT NULL,
  `etablissement` varchar(20) COLLATE utf8_bin NOT NULL,
  `specialite` varchar(20) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(10) COLLATE utf8_bin NOT NULL,
  `situationuniv` varchar(10) COLLATE utf8_bin NOT NULL,
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL,
  `codeins` int(11) DEFAULT NULL,
  `approuvee` tinyint(4) NOT NULL,
  `userapprouvee` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80776693 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `nom`, `prenom`, `datenaiss`, `lieunaiss`, `gouvernorat`, `pays`, `nationalite`, `genre`, `adresse`, `codpostal`, `numtel`, `annebac`, `section`, `session`, `mention`, `etablissement`, `specialite`, `niveau`, `situationuniv`, `codeetab`, `codeins`, `approuvee`, `userapprouvee`) VALUES
(7431458, 'ferchichi', 'imen', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666673, 0, NULL),
(8972364, 'islem', 'ben hlel', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666671, 0, NULL),
(8976566, 'kortas', 'Abdellatif', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', '', '', 'CESE1', 666680, 0, NULL),
(12345678, 'mrabet', 'wael', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666672, 0, NULL),
(15151515, 'ANSSI', 'ilhem', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', '', '', 'CESE1', 666679, 0, NULL),
(33333333, 'hedi', 'Med', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666674, 0, NULL),
(44444444, 'deymi', 'omar', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666676, 0, NULL),
(55667788, 'toumi', 'mohamed', '1990-05-13', 'manouba', 'manouba', 'tunisie', 'tunisienne', 1, 'mannouba', 2022, 71888999, 2011, 'math', 'principale', 'assez bien', 'ESEN', 'ecommerce', '2eme', 'nouveau', 'CESE1', 666666, 0, NULL),
(80776690, 'mwelhi', 'malek', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', 'ESEN', '', '', '', 'CESE1', 666675, 0, NULL),
(80776691, '', '', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', '', '', 'CESE1', 666677, 0, NULL),
(80776692, '', '', '0000-00-00', '', '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', '', '', 'CESE1', 666678, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
`codeins` int(11) NOT NULL,
  `nomins` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `prenomins` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cinins` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `login` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `motdepasse` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=666681 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`codeins`, `nomins`, `prenomins`, `cinins`, `tel`, `login`, `motdepasse`) VALUES
(666666, 'FHGDESAN', 'OIUKHTFREZS', '089765432', 20161114, 'LLLLOLLOL', 'HHGFDEVC'),
(666670, 'ben hlel', 'islem', '08972364', NULL, 'bbeautiful.101@hotmail.com', 'AZERTY'),
(666671, 'islem', 'ben hlel', '08972364', NULL, 'sidra_konia@hotmail.fr', 'SALLOUMA'),
(666672, 'mrabet', 'wael', '12345678', NULL, 'beautiful.101@hotmail.com', 'AZERTY'),
(666673, 'ferchichi', 'imen', '07431458', NULL, 'checkbox54@gmail.com', 'etudiant'),
(666674, 'hedi', 'Med', '33333333', NULL, 'beautiful.101@hotmail.com', 'alo'),
(666675, 'mwelhi', 'malek', '80776690', NULL, 'pro100@gmail.com', 'propro'),
(666676, 'deymi', 'omar', '44444444', NULL, 'essai5@live.fr', 'essai'),
(666677, '', '', '', NULL, '', ''),
(666678, '', '', '', NULL, '', ''),
(666679, 'ANSSI', 'ilhem', '15151515', NULL, 'inconnu@gmail.com', 'inconnu'),
(666680, 'kortas', 'Abdellatif', '08976566', NULL, 'kortaskas@hotmail.fr', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `mutation`
--

CREATE TABLE IF NOT EXISTS `mutation` (
  `codedem` int(5) NOT NULL,
  `ville` varchar(10) COLLATE utf8_bin NOT NULL,
  `anneeuniv` varchar(10) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(10) COLLATE utf8_bin NOT NULL,
  `section` varchar(40) COLLATE utf8_bin NOT NULL,
  `resultat` varchar(10) COLLATE utf8_bin NOT NULL,
  `nivdem` tinyint(4) NOT NULL,
  `sectiondem` varchar(40) COLLATE utf8_bin NOT NULL,
  `etablissdem` varchar(40) COLLATE utf8_bin NOT NULL,
  `cause` tinyint(4) NOT NULL,
  `sanction` tinyint(4) NOT NULL,
  `typesanc` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `mutation`
--

INSERT INTO `mutation` (`codedem`, `ville`, `anneeuniv`, `niveau`, `section`, `resultat`, `nivdem`, `sectiondem`, `etablissdem`, `cause`, `sanction`, `typesanc`) VALUES
(1, '', '', '2eme', 'math', '', 2, 'Math', 'CENS', 0, 0, ''),
(11, 'omrane', '2015', '2eme', 'comptabilite', 'admis', 2, 'affaire', 'iscae', 1, 1, 'mmmmm');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
  `codeparcours` varchar(5) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(20) COLLATE utf8_bin NOT NULL,
  `diplome` varchar(20) COLLATE utf8_bin NOT NULL,
  `specialite` varchar(20) COLLATE utf8_bin NOT NULL,
  `codeetab` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`codeparcours`, `niveau`, `diplome`, `specialite`, `codeetab`) VALUES
('ces1', 'licence', 'LFG Finance', 'finance', 'CESC4'),
('ces2', 'licence', 'LFG  Marketing', 'marketing', 'CESC4'),
('ces3', 'licence', 'LFG Management', 'management', 'CESC4'),
('ces4', 'licence', 'licence fondamentale', 'economie', 'CESC4'),
('ces5', 'licence', 'licence fondamentale', 'LFIAG', 'CESC4'),
('ces6', 'licence', 'LAG (marketing) VNC', 'marketing', 'CESC4'),
('ces7', 'licence', 'LAG (finance) GIF', 'finance', 'CESC4'),
('ces8', 'licence', 'LAG (management) GHT', 'management', 'CESC4'),
('ces9', 'licence', 'LAE TCI', 'economie', 'CESC4'),
('cpe1', 'licence', 'licence appliquee en', 'e commerce', 'CESE1'),
('cpe2', 'licence', 'licence appliquee en', 'TSI', 'CESE1'),
('cpe3', 'licence', 'licence fondamentale', 'LFIAG', 'CESE1'),
('cpe4', 'mastere', 'mastere de recherche', 'web intelligence', 'CESE1'),
('cpe5', 'mastere', 'mastere professionne', 'MBDS', 'CESE1'),
('cpe6', 'mastere', 'mastere professionne', 'e commerce', 'CESE1'),
('cpe7', 'mastere', 'mastere professionne', 'VIC', 'CESE1'),
('cpi1', 'licence', 'licence informatique', 'informatique multime', 'CISC3'),
('cpi2', 'licence', 'licence en communica', 'communication multim', 'CISC3'),
('cpi3', 'licence', 'licence en audio vis', 'audio visuel', 'CISC3'),
('cpi4', 'mastere', 'mastere professionne', '', 'CISC3'),
('cpi5', 'mastere', 'mastere de recherche', '', 'CISC3'),
('cpi6', 'cycle ingenierie', '', '', 'CISC3');

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

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`idpersonnel`, `nom`, `prenom`, `cin`, `adresse`, `numtel`, `Titre`, `organisme`, `codeetab`, `login`) VALUES
(27800, '', 'Houda', 12312333, 'mannouba', 71444555, 'agent scolarite etab', 'ESEN', 'CESE1', 'ageer'),
(77500, '', 'Jamel', 11111111, 'mannouba', 71333444, 'secretaire generale', 'ESEN', 'CESE1', 'secte1'),
(77560, 'X', 'Y', 56565656, 'mannouba', 71565656, 'agent scolarite', 'UMA', '', 'aguma'),
(77865, 'rim', 'jallouli', 55667788, 'mannouba', 20161114, 'directrice', 'esen', 'CESE1', 'azer44'),
(80000, 'W', 'Z', 88000999, 'mannouba', 71121212, 'president uma', 'UMA', '', 'pres001');

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
  `codedem` int(5) NOT NULL,
  `ville` varchar(10) COLLATE utf8_bin NOT NULL,
  `anneeuniv` varchar(10) COLLATE utf8_bin NOT NULL,
  `section` varchar(20) COLLATE utf8_bin NOT NULL,
  `resultat` varchar(10) COLLATE utf8_bin NOT NULL,
  `codesd` int(5) NOT NULL,
  `sectdemande` varchar(40) COLLATE utf8_bin NOT NULL,
  `etabdemande` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `reorientation`
--

INSERT INTO `reorientation` (`codedem`, `ville`, `anneeuniv`, `section`, `resultat`, `codesd`, `sectdemande`, `etabdemande`) VALUES
(222, 'omrane', '2015', 'ECOMMERCE', 'admise', 27500, 'TSI', 'ESC');

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `codedem` int(5) NOT NULL,
  `numpasseport` double NOT NULL,
  `ville` varchar(10) COLLATE utf8_bin NOT NULL,
  `anneeuniv` varchar(10) COLLATE utf8_bin NOT NULL,
  `etablissement` varchar(20) COLLATE utf8_bin NOT NULL,
  `niveau` varchar(10) COLLATE utf8_bin NOT NULL,
  `section` varchar(20) COLLATE utf8_bin NOT NULL,
  `resultat` varchar(20) COLLATE utf8_bin NOT NULL,
  `causereport` tinyint(4) NOT NULL,
  `causerepperso` tinyint(4) NOT NULL,
  `causerepsante` tinyint(4) NOT NULL,
  `fichier` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `report`
--

INSERT INTO `report` (`codedem`, `numpasseport`, `ville`, `anneeuniv`, `etablissement`, `niveau`, `section`, `resultat`, `causereport`, `causerepperso`, `causerepsante`, `fichier`) VALUES
(11122, 0, 'mannouba', '2014-2015', 'ESEN', '2eme', 'ECOMMERCE', 'admis', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `retrait`
--

CREATE TABLE IF NOT EXISTS `retrait` (
  `codedem` int(5) NOT NULL,
  `cause` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `retrait`
--

INSERT INTO `retrait` (`codedem`, `cause`) VALUES
(33, 'iugiugiuguyg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `authentif`
--
ALTER TABLE `authentif`
 ADD PRIMARY KEY (`login`);

--
-- Index pour la table `chparcours`
--
ALTER TABLE `chparcours`
 ADD PRIMARY KEY (`codedem`), ADD KEY `codedem` (`codedem`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
 ADD PRIMARY KEY (`codedem`), ADD KEY `cin` (`cin`);

--
-- Index pour la table `detailconsult`
--
ALTER TABLE `detailconsult`
 ADD PRIMARY KEY (`cin`,`codeparcours`), ADD KEY `cin` (`cin`), ADD KEY `codeparcours` (`codeparcours`);

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
 ADD PRIMARY KEY (`codedem`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
 ADD PRIMARY KEY (`codeparcours`), ADD KEY `code_etab` (`codeetab`);

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
 ADD PRIMARY KEY (`codedem`), ADD KEY `code_dem` (`codedem`), ADD KEY `code_dem_2` (`codedem`);

--
-- Index pour la table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`codedem`);

--
-- Index pour la table `retrait`
--
ALTER TABLE `retrait`
 ADD PRIMARY KEY (`codedem`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
MODIFY `codedem` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55778;
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
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chparcours`
--
ALTER TABLE `chparcours`
ADD CONSTRAINT `chparcours_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `etudiant` (`cin`);

--
-- Contraintes pour la table `detailconsult`
--
ALTER TABLE `detailconsult`
ADD CONSTRAINT `detailconsult_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `etudiant` (`cin`),
ADD CONSTRAINT `detailconsult_ibfk_2` FOREIGN KEY (`codeparcours`) REFERENCES `parcours` (`codeparcours`);

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
ADD CONSTRAINT `codeins` FOREIGN KEY (`codeins`) REFERENCES `inscription` (`codeins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`codeetab`) REFERENCES `etablissement` (`codeetab`);

--
-- Contraintes pour la table `mutation`
--
ALTER TABLE `mutation`
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
ADD CONSTRAINT `reorientation_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

--
-- Contraintes pour la table `report`
--
ALTER TABLE `report`
ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

--
-- Contraintes pour la table `retrait`
--
ALTER TABLE `retrait`
ADD CONSTRAINT `retrait_ibfk_1` FOREIGN KEY (`codedem`) REFERENCES `demande` (`codedem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
