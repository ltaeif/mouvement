-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 19 Juin 2015 à 10:50
-- Version du serveur: 5.1.50
-- Version de PHP: 5.4.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pay2014`
--


CREATE TABLE IF NOT EXISTS `lang` (
  `idlang` int(11) NOT NULL AUTO_INCREMENT,
  `iso_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intitule` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `default` tinyint(4) DEFAULT '0',
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idlang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`idlang`, `iso_code`, `intitule`, `active`, `default`, `deleted`) VALUES
(1, 'ar', 'Arabe', 1, 1, 0),
(2, 'fr', 'Français', 1, 0, 0),
(3, 'en', 'Anglais', 1, 0, 0);
--
-- Structure de la table `etablissement`
--

--
-- Structure de la table `universite`
--

CREATE TABLE IF NOT EXISTS `universite` (
  `iduniversite` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iduniversite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1001 ;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`iduniversite`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(1000);

-- --------------------------------------------------------

--
-- Structure de la table `universite_lang`
--

CREATE TABLE IF NOT EXISTS `universite_lang` (
  `iduniversite_lang` int(11) NOT NULL AUTO_INCREMENT,
  `universite_iduniversite` int(11) NOT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abrev` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_idlang` int(11) NOT NULL,
  PRIMARY KEY (`iduniversite_lang`),
  KEY `fk_universite_lang_universite1` (`universite_iduniversite`),
  KEY `fk_universite_lang_lang1` (`lang_idlang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Contenu de la table `universite_lang`
--

INSERT INTO `universite_lang` (`iduniversite_lang`, `universite_iduniversite`, `intitule`, `abrev`, `lang_idlang`) VALUES
(1, 1, 'جامعة الزيتونة', NULL, 1),
(2, 2, 'جامعة منوبة', NULL, 1),
(3, 3, 'جامعة تونس', NULL, 1),
(4, 4, 'جامعة تونس المنار', NULL, 1),
(5, 5, 'جامعة قرطاج', NULL, 1),
(6, 6, 'جامعة جندوبة', NULL, 1),
(7, 7, 'جامعة سوسة', NULL, 1),
(8, 8, 'جامعة المنستير', NULL, 1),
(9, 9, 'جامعة القيروان', NULL, 1),
(10, 10, 'جامععة صفاقس', NULL, 1),
(11, 11, 'جامعة قفصة', NULL, 1),
(12, 12, 'جامعة قابس', NULL, 1),
(13, 13, 'الجامعة الإفتراضية', NULL, 1),
(14, 1, 'Université Zitouna', NULL, 2),
(15, 2, 'Université de la Manouba', NULL, 2),
(16, 3, 'Université de Tunis', NULL, 2),
(17, 4, 'Université de Tunis el Manar', NULL, 2),
(18, 5, 'Université de Carthage', NULL, 2),
(19, 6, 'Université de Jendouba', NULL, 2),
(20, 7, 'Université de Sousse', NULL, 2),
(21, 8, 'Université de Monastir', NULL, 2),
(22, 9, 'Université de Kairouan', NULL, 2),
(23, 10, 'Université de Sfax', NULL, 2),
(24, 11, 'Université de Gafsa', NULL, 2),
(25, 12, 'Université de Gabès', NULL, 2),
(26, 13, 'Université virtuelle', NULL, 2),
(27, 1, 'University of Zitouna', NULL, 3),
(28, 14, 'المديرية العامة للدراسات التكنولوجية', NULL, 1),
(29, 14, 'Direction Générale des Etudes Technologiques', NULL, 2);

--
CREATE TABLE IF NOT EXISTS `etablissement` (
  `idetablissement` int(11) NOT NULL AUTO_INCREMENT,
  `universite_iduniversite` int(11) NOT NULL,
  PRIMARY KEY (`idetablissement`),
  KEY `fk_etablissement_universite1` (`universite_iduniversite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1001 ;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`idetablissement`, `universite_iduniversite`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 6),
(70, 6),
(71, 6),
(72, 6),
(73, 6),
(74, 6),
(75, 6),
(76, 7),
(77, 7),
(78, 7),
(79, 7),
(80, 7),
(81, 7),
(82, 7),
(83, 7),
(84, 7),
(85, 7),
(86, 7),
(87, 7),
(88, 7),
(89, 7),
(90, 7),
(91, 8),
(92, 8),
(93, 8),
(94, 8),
(95, 8),
(96, 8),
(97, 8),
(98, 8),
(99, 8),
(100, 8),
(101, 8),
(102, 8),
(103, 8),
(104, 8),
(105, 8),
(106, 9),
(107, 9),
(108, 9),
(109, 9),
(110, 9),
(111, 9),
(112, 10),
(113, 10),
(114, 10),
(115, 10),
(116, 10),
(117, 10),
(118, 10),
(119, 10),
(120, 10),
(121, 10),
(122, 10),
(123, 10),
(124, 10),
(125, 10),
(126, 10),
(127, 10),
(128, 10),
(129, 11),
(130, 11),
(131, 11),
(132, 12),
(133, 12),
(134, 12),
(135, 12),
(136, 12),
(137, 12),
(138, 12),
(139, 12),
(140, 12),
(141, 13),
(142, 14),
(143, 14),
(144, 14),
(145, 14),
(146, 14),
(147, 14),
(148, 14),
(149, 14),
(150, 14),
(151, 14),
(152, 14),
(153, 14),
(154, 14),
(155, 14),
(156, 14),
(157, 14),
(158, 14),
(159, 14),
(160, 14),
(161, 14),
(162, 14),
(1000, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `etablissement_lang`
--

CREATE TABLE IF NOT EXISTS `etablissement_lang` (
  `idetablissement_lang` int(11) NOT NULL AUTO_INCREMENT,
  `etablissement_idetablissement` int(11) NOT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abrev` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_idlang` int(11) NOT NULL,
  PRIMARY KEY (`idetablissement_lang`),
  KEY `fk_etablissement_lang_etablissement1` (`etablissement_idetablissement`),
  KEY `fk_etablissement_lang_lang1` (`lang_idlang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=325 ;

--
-- Contenu de la table `etablissement_lang`
--

INSERT INTO `etablissement_lang` (`idetablissement_lang`, `etablissement_idetablissement`, `intitule`, `abrev`, `lang_idlang`) VALUES
(1, 1, 'المعهد الأعلى للحضارة الاسلامية بتونس', NULL, 1),
(2, 2, 'المعهد الأعلى للحضارة الإسلامية بتونس', NULL, 1),
(3, 3, 'مركز الدراسات الإسلامية بالقيروان', NULL, 1),
(4, 4, 'كلية الآداب والفنون والإنسانيات بمنوبة', NULL, 1),
(5, 5, 'المعهد الأعلى للمحاسبة وإدارة المؤسسات بتونس', NULL, 1),
(6, 6, 'المعهد العالي لفنون الملتيميديا بمنوبة', NULL, 1),
(7, 7, 'المعهد الأعلى للتوثيق بتونس', NULL, 1),
(8, 8, 'معهد الصحافة وعلوم الأخبار', NULL, 1),
(9, 9, 'المعهد الأعلى للرياضة والتربية البدنية بقصر سعيد', NULL, 1),
(10, 10, 'معهد النهوض بالمعاقين قصر السعيد', NULL, 1),
(11, 11, 'المعهد العالي للبيوتكنولوجيا بسيدي ثابت', NULL, 1),
(12, 12, 'المدرسة الوطنية لعلوم الإعلامية', NULL, 1),
(13, 13, 'المدرسة العليا للتجارة بتونس', NULL, 1),
(14, 14, 'المدرسة العليا للتجارة الإلكترونية بمنوبة', NULL, 1),
(15, 15, 'المدرسة العليا لعلوم وتكنولوجيات التصميم', NULL, 1),
(16, 16, 'المدرسة الوطنية للطب البيطري بسيدي ثابت', NULL, 1),
(17, 17, 'المعهد الأعلى لتاريخ الحركة الوطنيّة', NULL, 1),
(18, 18, 'كلية العلوم الإنسانية والإجتماعية بتونس', NULL, 1),
(19, 19, 'المعهد العالي للفنون الجميلة بتونس', NULL, 1),
(20, 20, 'المعهد التحضيري للدراسات الأدبية و العلوم الإنسانية بتونس', NULL, 1),
(21, 21, 'المعهد التحضيري للدراسات الهندسية بتونس', NULL, 1),
(22, 22, 'المعهد الأعلى للتصرف بتونس', NULL, 1),
(23, 23, 'المعهد العالي لمهن التراث بتونس', NULL, 1),
(24, 24, 'دار المعلمين العليا', NULL, 1),
(25, 25, 'المدرسة العليا للعلوم الاقتصادية والتجارية بتونس', NULL, 1),
(26, 26, 'المدرسة العليا للعلوم والتقنيات بتونس', NULL, 1),
(27, 27, 'المعهد الأعلى للموسيقى بتونس', NULL, 1),
(28, 28, 'المعهد العالي للتنشيط الشبابي والثقافي ببئر الباي', NULL, 1),
(29, 29, 'المعهد العالي للدراسات التطبيقية في الإنسانيات بتونس', NULL, 1),
(30, 30, 'كلية الطب بتونس', NULL, 1),
(31, 31, 'كلية العلوم الإقتصادية والتصرف بتونس', NULL, 1),
(32, 32, 'كلية الحقوق والعلوم السياسية بتونس', NULL, 1),
(33, 33, 'كلية العلوم للرياضيات والفيزياء والطبيعيات بتونس', NULL, 1),
(34, 34, 'المعهد العالي للإعلامية بالمنار', NULL, 1),
(35, 35, 'المدرسة الوطنية للمهندسين بتونس', NULL, 1),
(36, 36, 'معهد بورقيبة للغات بتونس', NULL, 1),
(37, 37, 'المعهد التحضيري للدراسات الهندسية بالمنار', NULL, 1),
(38, 38, 'المعهد العالي للتكنولوجيات الطبية بتونس', NULL, 1),
(39, 39, 'المعهد العالي للعلوم الإنسانية بتونس', NULL, 1),
(40, 40, 'المعهد العالي للعلوم البيولوجية التطبيقية بتونس', NULL, 1),
(41, 41, 'المدرسة العليا لعلوم وتقنيات الصحة بتونس', NULL, 1),
(42, 42, 'معهد باستور بتونس', NULL, 1),
(43, 43, 'معهد البحوث البيطرية بتونس', NULL, 1),
(44, 44, 'كلية العلوم القانونية والسياسية والاجتماعية بتونس', NULL, 1),
(45, 45, 'كلية العلوم ببنزرت', NULL, 1),
(46, 46, 'كلية العلوم الاقتصادية والتصرف بنابل', NULL, 1),
(47, 47, 'المعهد التحضيري للدراسات العلمية والتقنية', NULL, 1),
(48, 48, 'المعهد التحضيري للدراسات الهندسية ببنزرت', NULL, 1),
(49, 49, 'المعهد التحضيري للدراسات الهندسية بنابل', NULL, 1),
(50, 50, 'المعهد العالي للعلوم التطبيقية والتكنولوجيا بماطر', NULL, 1),
(51, 51, 'المعهد العالي لتكنولوجيات البيئة والعمران والبنيان بتونس', NULL, 1),
(52, 52, 'معهد الدراسات العليا التجارية بقرطاج', NULL, 1),
(53, 53, 'المعهد الوطني للعلوم التطبيقية والتكنولوجيا', NULL, 1),
(54, 54, 'المعهد الأعلى لإطارات الطفولة', NULL, 1),
(55, 55, 'المعهد الوطني للشغل والدراسات الاجتماعية بتونس', NULL, 1),
(56, 56, 'معهد الدراسات السياحية العليا بسيدي الظريف', NULL, 1),
(57, 57, 'المعهد العالي للعلوم وتكنولوجيات البيئة ببرج السدرية', NULL, 1),
(58, 58, 'المعهد العالي للغات التطبيقية والإعلامية بنابل', NULL, 1),
(59, 59, 'المعهد العالي للتجارة والمحاسبة ببنزرت', NULL, 1),
(60, 60, 'المدرسة العليا للموصلات بتونس', NULL, 1),
(61, 61, 'المدرسة التونسية للتقنيات بتونس', NULL, 1),
(62, 62, 'المدرسة العليا للسمعي البصري والسنيما بقمرت', NULL, 1),
(63, 63, 'المدرسة العليا للتكنولوجيا والإعلامية', NULL, 1),
(64, 64, 'المدرسة العليا للصناعات الغذائية بتونس', NULL, 1),
(65, 65, 'المدرسة العليا للفلاحة بمقرن', NULL, 1),
(66, 66, 'المدرسة العليا للفلاحة بماطر', NULL, 1),
(67, 67, 'المعهد الوطني للعلوم الفلاحية بتونس', NULL, 1),
(68, 68, 'المعهد الأعلى للصيد البحري وتربية الأحياء المائية ببنزرت', NULL, 1),
(69, 69, 'كلية العلوم القانونية والاقتصادية والتصرف بجندوبة', NULL, 1),
(70, 70, 'المعهد العالي للغات التطبيقية والإعلامية بباجة', NULL, 1),
(71, 71, 'المعهد العالي للدراسات التطبيقية في الإنسانيات بالكاف', NULL, 1),
(72, 72, 'المعهد العالي للبيوتكنولوجيا بباجة', NULL, 1),
(73, 73, 'المدرسة العليا للفلاحة بالكاف', NULL, 1),
(74, 74, 'المدرسة العليا لمهندسي التجهيز الريفي بمجاز الباب', NULL, 1),
(75, 75, 'معهد الغابات والمراعي الغابية بطبرقة', NULL, 1),
(76, 76, 'كلية الحقوق والعلوم الإقتصادية والسياسية بسوسة', NULL, 1),
(77, 77, 'كلية الآداب والعلوم الإنسانية بسوسة', NULL, 1),
(78, 78, 'كلية الطب بسوسة', NULL, 1),
(79, 79, 'المعهد العالي للتصرف بسوسة', NULL, 1),
(80, 80, 'المعهد العالي للمالية والجباية بسوسة', NULL, 1),
(81, 81, 'المعهد العالي للإعلامية وتقنيات الاتصال بحمام سوسة', NULL, 1),
(82, 82, 'المعهد العالي للنقل وخدمات الاتصال بسوسة', NULL, 1),
(83, 83, 'المعهد العالي للفنون الجميلة بسوسة', NULL, 1),
(84, 84, 'المعهد العالي للموسيقى بسوسة', NULL, 1),
(85, 85, 'المعهد العالي للعلوم التطبيقية والتكنولوجيا بسوسة', NULL, 1),
(86, 86, 'معهد الدراسات العليا التجارية بسوسة', NULL, 1),
(87, 87, 'المدرسة العاليا للعلوم والتكنولوجيا بحمام سوسة', NULL, 1),
(88, 88, 'المدرسة الوطنية للمهندسين بسوسة', NULL, 1),
(89, 89, 'المدرسة العليا لعلوم وتقنيات الصحة بسوسة', NULL, 1),
(90, 90, 'المدرسة العليا للبستنة وتربية الماشية بشط مريم', NULL, 1),
(91, 91, 'كلية العلوم بالمنستير', NULL, 1),
(92, 92, 'كلية الطب بالمنستير', NULL, 1),
(93, 93, 'كلية طب الأسنان بالنستير', NULL, 1),
(94, 94, 'كلية الصيدلة بالمنستير', NULL, 1),
(95, 95, 'كلية العلوم الإقتصادية والتصرف بالمهدية', NULL, 1),
(96, 96, 'المعهد التحضيري للدراسات الهندسية بالمنستير', NULL, 1),
(97, 97, 'المعهد العالي للإعلامية والرياضيات بالمنستير', NULL, 1),
(98, 98, 'المعهد العالي للدراسات التطبيقية في الإنسانيات بالمهدية', NULL, 1),
(99, 99, 'المعهد العالي للبيوتكنولوجيا بالمنستير', NULL, 1),
(100, 100, 'المعهد العالي للغات المطبقة في الأعمال و السياحة بالمكنين', NULL, 1),
(101, 101, 'المعهد العالي للعلوم التطبيقية والتكنولوجيا بالمهدية', NULL, 1),
(102, 102, 'المعهد العالي للإعلامية بالمهدية', NULL, 1),
(103, 103, 'المعهد العالي لمهن الموضة بالمنستير', NULL, 1),
(104, 104, 'المدرسة العليا لعلوم وتقنيات الصحة بالمنستير', NULL, 1),
(105, 105, 'المدرسة الوطنية للمهندسين بالمنستير', NULL, 1),
(106, 106, 'كلية الآداب والعلوم الإنسانية بالقيروان', NULL, 1),
(107, 107, 'المعهد العالي للإعلامية والتصرف بالقيروان', NULL, 1),
(108, 108, 'المعهد العالي للدراسات القانونية والسياسية بالقيروان', NULL, 1),
(109, 109, 'المعهد العالي للفنون والحرف بالقيروان', NULL, 1),
(110, 110, 'المعهد العالي للفنون والحرف بالقصرين', NULL, 1),
(111, 111, 'المعهد العالي للعلوم التطبيقية والتكنولوجيا بالقيروان', NULL, 1),
(112, 112, 'كلية الحقوق بصفاقس', NULL, 1),
(113, 113, 'كلية العلوم بصفاقس', NULL, 1),
(114, 114, 'كلية العلوم الإقتصادية والتصرف بصفاقس', NULL, 1),
(115, 115, 'كلية الطب بصفاقس', NULL, 1),
(116, 116, 'كلية الآداب والعلوم الإنسانية  بصفاقس', NULL, 1),
(117, 117, 'المعهد العالي للإلكترونيك والاتصال بصفاقس', NULL, 1),
(118, 118, 'المعهد العالي للتصرف الصناعي بصفاقس', NULL, 1),
(119, 119, 'المعهد العالي للإدارة الأعمال بصفاقس', NULL, 1),
(120, 120, 'المعهد العالي للإعلامية والملتيميديا بصفاقس', NULL, 1),
(121, 121, 'المعهد العالي للموسيقى بصفاقس', NULL, 1),
(122, 122, 'المعهد التحضيري للدراسات الهندسية بصفاقس', NULL, 1),
(123, 123, 'المعهد الأعلى للرياضة والتربية البدنية بصفاقس', NULL, 1),
(124, 124, 'المعهد العالي للفنون والحرف بصفاقس', NULL, 1),
(125, 125, 'المعهد العالي للبيوتكنولوجيا بصفاقس', NULL, 1),
(126, 126, 'معهد الدراسات العليا التجارية بصفاقس', NULL, 1),
(127, 127, 'المدرسة العليا للتجارة بصفاقس', NULL, 1),
(128, 128, 'المدرسة الوطنية للمهندسين بصفاقس', NULL, 1),
(129, 129, 'المعهد العالي لإدارة المؤسسات بقفصة', NULL, 1),
(130, 130, 'كلية العلوم بقفصة', NULL, 1),
(131, 131, 'المعهد العالي للفنون والحرف بقفصة', NULL, 1),
(132, 132, 'كلية العلوم بقابس', NULL, 1),
(133, 133, 'المدرسة الوطنية للمهندسين بقابس', NULL, 1),
(134, 134, 'المعهد العالي للغات بقابس', NULL, 1),
(135, 135, 'المعهد العالي للفنون والحرف بقابس', NULL, 1),
(136, 136, 'المعهد الأعلى للتصرف بقابس', NULL, 1),
(137, 137, 'المعهد العالي للدراسات القانونية بقابس', NULL, 1),
(138, 138, 'المعهد العالي لعلوم وتقنيات المياه بقابس', NULL, 1),
(139, 139, 'المعهد العالي للدراسات التطبيقية في الإنسانيات بمدنين', NULL, 1),
(140, 140, 'المعهد العالي للفنون والحرف بتطاوين', NULL, 1),
(141, 141, 'المعهد الأعلى للتربية والتكوين المستمر', NULL, 1),
(142, 142, 'المعهد العالي للدراسات التكنولوجية بصفاقس', NULL, 1),
(143, 143, 'المعهد العالي للدراسات التكنولوجية بالقيروان', NULL, 1),
(144, 144, 'المعهد العالي للدراسات التكنولوجية بقفصة', NULL, 1),
(145, 145, 'المعهد العالي للدراسات التكنولوجية بقبلي', NULL, 1),
(146, 146, 'المعهد العالي للدراسات التكنولوجية بقابس', NULL, 1),
(147, 147, 'المعهد العالي للدراسات التكنولوجية بجربة', NULL, 1),
(148, 148, 'المعهد العالي للدراسات التكنولوجية بالكاف', NULL, 1),
(149, 149, 'المعهد العالي للدراسات التكنولوجية بزغوان', NULL, 1),
(150, 150, 'المعهد العالي للدراسات التكنولوجية بسوسة', NULL, 1),
(151, 151, 'المعهد العالي للدراسات التكنولوجية بالمهدية', NULL, 1),
(152, 152, 'المعهد العالي للدراسات التكنولوجية بسليانة', NULL, 1),
(153, 153, 'المعهد العالي للدراسات التكنولوجية برادس', NULL, 1),
(154, 154, 'المعهد العالي للدراسات التكنولوجية بنابل', NULL, 1),
(155, 155, 'المعهد العالي للدراسات التكنولوجية بسيدي بوزيد', NULL, 1),
(156, 156, 'المعهد العالي للدراسات التكنولوجية في المواصلات بتونس', NULL, 1),
(157, 157, 'المعهد العالي للدراسات التكنولوجية بجندوبة', NULL, 1),
(158, 158, 'المعهد العالي للدراسات التكنولوجية بالشرقية', NULL, 1),
(159, 159, 'المعهد العالي للدراسات التكنولوجية بقصر هلال', NULL, 1),
(160, 160, 'المعهد العالي للدراسات التكنولوجية بتطاوين', NULL, 1),
(161, 161, 'المعهد العالي للدراسات التكنولوجية بمدنين', NULL, 1),
(162, 162, 'المعهد العالي للدراسات التكنولوجية بتوزر', NULL, 1),
(163, 1, 'Institut Supérieur de Théologie de Tunis ', NULL, 2),
(164, 2, 'Institut Supérieur de Civilisation Islamique ', NULL, 2),
(165, 3, 'Centre de études islamique de Kairouan ', NULL, 2),
(166, 4, 'Faculté des Lettres, des Arts et des Humanités de la Manouba ', NULL, 2),
(167, 5, 'Institut Supérieur de Comptabilité et d''Administration des Entreprises ', NULL, 2),
(168, 6, 'Institut Supérieur des Arts du Multimédia de la Manouba ', NULL, 2),
(169, 7, 'Institut Supérieur de Documentation de Tunis ', NULL, 2),
(170, 8, 'Institut de presse et des sciences de l''information ', NULL, 2),
(171, 9, 'Institut Supérieur du Sport et de l''Education Physique de Ksar Saïd ', NULL, 2),
(172, 10, 'Institut de Promotion des Handicapés  ', NULL, 2),
(173, 11, 'Institut Supérieur de Biotechnologie de Sidi Thabet ', NULL, 2),
(174, 12, 'Ecole nationale des sciences de l''informatique ', NULL, 2),
(175, 13, 'Ecole Supérieure de Commerce de Tunis ', NULL, 2),
(176, 14, 'Ecole Supérieure de Commerce Electronique de la Manouba ', NULL, 2),
(177, 15, 'Ecole Nationale de Médecine Vétérinaire ', NULL, 2),
(178, 16, 'Ecole Supérieure des Sciences et Technologies du Design ', NULL, 2),
(179, 17, 'Institut Supérieur d''Histoire du Mouvement National (ISHMN) ', NULL, 2),
(180, 18, 'Faculté des Sciences Humaines et Sociales de Tunis ', NULL, 2),
(181, 19, 'Institut Supérieur des Beaux Arts de Tunis ', NULL, 2),
(182, 20, 'Institut Préparatoire aux Etudes Littéraires et de Sciences Humaines de Tunis ', NULL, 2),
(183, 21, 'Institut Préparatoire aux Etudes d''Ingénieur de Tunis ', NULL, 2),
(184, 22, 'Institut Supérieur de Gestion de Tunis ', NULL, 2),
(185, 23, 'Institut Supérieur des Sciences Culturelles et Métiers du Patrimoine de Tunis ', NULL, 2),
(186, 24, 'Ecole Normale Supérieure ', NULL, 2),
(187, 25, 'Ecole Supérieure des Sciences Economiques et Commerciales ', NULL, 2),
(188, 26, 'Ecole Supérieure des Sciences et Techniques de Tunis ', NULL, 2),
(189, 27, 'Institut Supérieur de Musique de Tunis ', NULL, 2),
(190, 28, 'Institut Supérieur de l''Animation Pour la Jeunesse et la Culture ', NULL, 2),
(191, 29, 'Institut Supérieur des Etudes Appliquées en Humanité de Tunis ', NULL, 2),
(192, 30, 'Faculté de Médecine de Tunis ', NULL, 2),
(193, 31, 'Faculté des Sciences Economiques et de Gestion de Tunis ', NULL, 2),
(194, 32, 'Faculté de Droit et des Sciences Politiques  de Tunis ', NULL, 2),
(195, 33, 'Faculté des Sciences Mathématiques, Physiques et Naturelles de Tunis ', NULL, 2),
(196, 34, 'Institut Supérieur d''Informatique d''El Manar ', NULL, 2),
(197, 35, 'Ecole Nationale d''Ingénieurs de Tunis ', NULL, 2),
(198, 36, 'Institut Bourguiba des Langues Vivantes ', NULL, 2),
(199, 37, 'Institut Préparatoire aux Etudes d''Ingénieurs d''El Manar ', NULL, 2),
(200, 38, 'Institut Supérieur des Technologies Médicales ', NULL, 2),
(201, 39, 'Institut Supérieur des Sciences Humaines de Tunis ', NULL, 2),
(202, 40, 'Institut Supérieur des Sciences Biologiques Appliquées ', NULL, 2),
(203, 41, 'Ecole Supérieure des Sciences et Techniques de la Santé de Tunis ', NULL, 2),
(204, 42, 'Institut Pasteur ', NULL, 2),
(205, 43, 'Institut de Recherche Vétérinaire de Tunis ', NULL, 2),
(206, 44, 'Faculté des Sciences Juridiques, Politiques et Sociales de Tunis ', NULL, 2),
(207, 45, 'Faculté des Sciences de Bizerte ', NULL, 2),
(208, 46, ' Faculté des Sciences Économiques et de Gestion de Nabeul ', NULL, 2),
(209, 47, 'Institut préparatoire aux études scientifiques et techniques de Tunis ', NULL, 2),
(210, 48, 'Institut préparatoire aux études d''ingénieurs de Bizerte ', NULL, 2),
(211, 49, 'Institut Préparatoire aux Etudes d''Ingénieur de Nabeul ', NULL, 2),
(212, 50, 'Institut supérieur des sciences appliquées et de technologie de Mateur ', NULL, 2),
(213, 51, 'Institut supérieur des technologies de l''environnement, de l''urbanisme et du bâtiment ', NULL, 2),
(214, 52, 'Institut des Hautes Etudes Commerciales de Carthage ', NULL, 2),
(215, 53, 'Institut National des Sciences Appliquées et de la Technologie ', NULL, 2),
(216, 54, 'Institut supérieur des cadres de l''enfance de Carthage Dermech ', NULL, 2),
(217, 55, 'Institut National du Travail et des Etudes Sociales ', NULL, 2),
(218, 56, 'Institut Supérieur des Etudes Touristique de Sidi Dhrif ', NULL, 2),
(219, 57, 'Institut Supérieur des Sciences et Technologies de l''Environnement de Borj Cédria ', NULL, 2),
(220, 58, 'Institut Supérieur des Langues Appliquées et d''Informatique de Nabeul ', NULL, 2),
(221, 59, 'Institut Supérieur de Commerce et de Comptabilité de Bizerte ', NULL, 2),
(222, 60, 'Ecole Supérieure des Communications de Tunis ', NULL, 2),
(223, 61, 'Ecole Polytechnique de Tunisie ', NULL, 2),
(224, 62, 'Ecole Supérieure de l''Audiovisuel et du Cinéma de Gammarth ', NULL, 2),
(225, 63, 'Ecole Supérieure de Technologie et d''Informatique à Carthage  ', NULL, 2),
(226, 64, 'Ecole Supérieure des industries alimentaires de Tunis ', NULL, 2),
(227, 65, 'Ecole Supérieur d''Agriculture de Mograne ', NULL, 2),
(228, 66, 'Ecole Supérieur  d''Agriculture de Mateur ', NULL, 2),
(229, 67, 'Institut National Agronomique de Tunis ', NULL, 2),
(230, 68, 'Institut Supérieur de pêche et d''aquaculture de Bizerte   ', NULL, 2),
(231, 69, 'Faculté des Sciences Juridiques Economiques et de Gestion Jendouba ', NULL, 2),
(232, 70, 'Institut Supérieur des Langues Appliquées et d''Informatique de Béja ', NULL, 2),
(233, 71, 'Institut Supérieur D''études Appliquées en Humanité Le Kef ', NULL, 2),
(234, 72, 'Institut Supérieur de Biotechnologie de Béja ', NULL, 2),
(235, 73, 'Ecole Supérieure d''Agriculture du Kef ', NULL, 2),
(236, 74, 'Ecole Supérieure d''Ingénieurs en Equipement Rural de Medjez El Bab ', NULL, 2),
(237, 75, 'Institut Sylvo-Pastoral de Tabarka ', NULL, 2),
(238, 76, 'Faculté de Droit et des Sciences Economiques et Politiques de Sousse ', NULL, 2),
(239, 77, 'Faculté des Lettres et des Sciences Humaines de Sousse ', NULL, 2),
(240, 78, 'Faculté de médecine ', NULL, 2),
(241, 79, 'Institut Supérieur de Gestion de Sousse ', NULL, 2),
(242, 80, 'Institut Supérieur de Finance et de Fiscalité de Sousse ', NULL, 2),
(243, 81, 'Institut Supérieur d''Informatique et des Technologies de Communication de Hammam Sousse ', NULL, 2),
(244, 82, 'Institut Supérieur du Transport et de la Logistique de Sousse ', NULL, 2),
(245, 83, 'Institut Supérieur de Beaux Arts de Sousse ', NULL, 2),
(246, 84, 'Institut Supérieur de Musique de Sousse ', NULL, 2),
(247, 85, 'Institut Supérieur des Sciences Appliquées et de Technologie de Sousse ', NULL, 2),
(248, 86, 'Institut des Hautes Etudes Commerciales de Sousse ', NULL, 2),
(249, 87, 'Ecole Supérieure des Sciences et de Technologie de Hammam Sousse ', NULL, 2),
(250, 88, 'Ecole Nationale d’Ingénieurs de Sousse ', NULL, 2),
(251, 89, 'École Supérieure des Sciences et Techniques de la Santé de Sousse ', NULL, 2),
(252, 90, 'Ecole Supérieure d''Horticulture de Chott Meriem ', NULL, 2),
(253, 91, 'Faculté des Sciences de Monastir ', NULL, 2),
(254, 92, 'Faculté de Médecine de Monastir ', NULL, 2),
(255, 93, 'Faculté de Médecine Dentaire de Monastir ', NULL, 2),
(256, 94, 'Faculté de Pharmacie de Monastir ', NULL, 2),
(257, 95, 'Faculté des Sciences Économiques et de Gestion de Mahdia', NULL, 2),
(258, 96, 'Institut Préparatoire aux Études d''Ingénieurs de Monastir ', NULL, 2),
(259, 97, 'Institut Supérieur d''Informatique et de Mathématiques de Monastir ', NULL, 2),
(260, 98, 'Institut Supérieur des Études Appliquées en Humanités de Mahdia ', NULL, 2),
(261, 99, 'Institut Supérieur de Biotechnologie de Monastir ', NULL, 2),
(262, 100, 'Institut Supérieur des Langues Appliquées aux Affaires et au Tourisme de Moknine ', NULL, 2),
(263, 101, 'Institut supérieur des sciences appliquées et de technologie de Mahdia   ', NULL, 2),
(264, 102, 'Institut Supérieur d''Informatique  de Mahdia ', NULL, 2),
(265, 103, 'Institut Supérieur des Métiers de la Mode de Monastir ', NULL, 2),
(266, 104, 'École Supérieure des Sciences et Techniques de la Santé de Monastir  ', NULL, 2),
(267, 105, 'École Nationale d''Ingénieurs de Monastir ', NULL, 2),
(268, 106, 'Faculté des Lettres et des Sciences Humaines de Kairouan ', NULL, 2),
(269, 107, 'Institut Supérieur d''Informatique et de Gestion de Kairouan ', NULL, 2),
(270, 108, 'Institut Supérieur des Études Juridiques et Politiques de Kairouan ', NULL, 2),
(271, 109, 'Institut Supérieur des Arts et Métiers de Kairouan ', NULL, 2),
(272, 110, 'Institut Supérieur des Arts et Métiers de Kasserine ', NULL, 2),
(273, 111, 'Institut Supérieur des Sciences Appliquées et de Technologie de Kairouan ', NULL, 2),
(274, 112, 'Faculté de droit de Sfax ', NULL, 2),
(275, 113, 'Faculté des sciences de Sfax ', NULL, 2),
(276, 114, 'Faculté des Sciences Économiques et de Gestion de Sfax ', NULL, 2),
(277, 115, 'Faculté de Médecine de Sfax ', NULL, 2),
(278, 116, 'Faculté des Lettres et Sciences Humaines de Sfax ', NULL, 2),
(279, 117, 'Institut Supérieur d''Électronique et de Communication de Sfax ', NULL, 2),
(280, 118, 'Institut supérieur de gestion industrielle de Sfax ', NULL, 2),
(281, 119, 'Institut Supérieur d''Administration des Affaires  de Sfax ', NULL, 2),
(282, 120, 'Institut Supérieur d''Informatique et de Multimédia de Sfax ', NULL, 2),
(283, 121, 'Institut Supérieur de Musique de Sfax ', NULL, 2),
(284, 122, 'Institut Préparatoire aux Études d''Ingénieurs de Sfax ', NULL, 2),
(285, 123, 'Institut Supérieur du Sport et de l''Éducation Physique de Sfax ', NULL, 2),
(286, 124, 'Institut Supérieur des Arts et Métiers de Sfax ', NULL, 2),
(287, 125, 'Institut Supérieur de Biotechnologies de Sfax ', NULL, 2),
(288, 126, 'Institut des Hautes Études Commerciales de Sfax ', NULL, 2),
(289, 127, 'École Supérieure de Commerce de Sfax ', NULL, 2),
(290, 128, 'École Nationale d''Ingénieurs de Sfax ', NULL, 2),
(291, 129, 'Faculté des Sciences de Gafsa ', NULL, 2),
(292, 130, 'Institut Supérieur d''Administration des Entreprises de Gafsa ', NULL, 2),
(293, 131, 'Institut Supérieur d’Arts et métiers de Gafsa ', NULL, 2),
(294, 132, 'Faculté des Sciences de Gabès ', NULL, 2),
(295, 133, 'École Nationale d''Ingénieur de Gabès ', NULL, 2),
(296, 134, 'Institut Supérieur des Langues de Gabès ', NULL, 2),
(297, 135, 'Institut Supérieur des Arts et Métiers de Gabès ', NULL, 2),
(298, 136, 'Institut Supérieur de Gestion de Gabès ', NULL, 2),
(299, 137, 'Institut Supérieur des Etudes Juridiques de Gabès ', NULL, 2),
(300, 138, 'Institut Supérieur des Sciences et Techniques des Eaux de Gabès ', NULL, 2),
(301, 139, 'Institut supérieur des études appliquées en Humanités de Médenine ', NULL, 2),
(302, 140, 'Institut Supérieur des Arts et Métiers de Tataouine ', NULL, 2),
(303, 141, 'Institut Supérieur de l''Education et de la Formation Continue ', NULL, 2),
(304, 142, 'ISET Sfax ', NULL, 2),
(305, 143, 'ISET Kairouan ', NULL, 2),
(306, 144, 'ISET Gafsa ', NULL, 2),
(307, 145, 'ISET Kebili ', NULL, 2),
(308, 146, 'ISET Gabès ', NULL, 2),
(309, 147, 'ISET Jerba ', NULL, 2),
(310, 148, 'ISET Kef ', NULL, 2),
(311, 149, 'ISET Zaghouan ', NULL, 2),
(312, 150, 'ISET Sousse ', NULL, 2),
(313, 151, 'ISET Mahdia ', NULL, 2),
(314, 152, 'ISET Siliana ', NULL, 2),
(315, 153, 'ISET Radès ', NULL, 2),
(316, 154, 'ISET Nabeul ', NULL, 2),
(317, 155, 'ISET Sidi Bouzid ', NULL, 2),
(318, 156, 'ISET''COM ', NULL, 2),
(319, 157, 'ISET Jendouba ', NULL, 2),
(320, 158, 'ISET Charguia ', NULL, 2),
(321, 159, 'ISET Ksar Hellal ', NULL, 2),
(322, 160, 'ISET Tataouine ', NULL, 2),
(323, 161, 'ISET Médenine ', NULL, 2),
(324, 162, 'ISET Tozeur ', NULL, 2);

-- --------------------------------------------------------






CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `libelle`, `description`) VALUES
(3001, 'Sciences et technologies', 'Sciences et technologies'),
(3002, 'Sciences et technologies', 'Médecine, pharmacie, sciences de la santé et médec'),
(3003, 'Sciences et technologies', 'Sciences économiques et de gestion'),
(3004, 'Sciences et technologies', 'Sciences appliquées et technologies'),
(3005, 'Arts', 'Beaux-Arts et arts et métiers'),
(3006, 'Sciences physiques', 'Sport et éducation physique'),
(3007, 'Sciences et technologies', 'Sciences humaines et sociales et théologie'),
(3008, 'Lettres', 'Lettres et langues');





--
-- Structure de la table `diplome`
--

CREATE TABLE IF NOT EXISTS `diplome` (
  `id_diplome` int(15) NOT NULL,
  `specialite` varchar(250) NOT NULL,
  `libelle` varchar(50) NOT NULL,
 
  PRIMARY KEY (`id_dipl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `diplome`
--

INSERT INTO `diplome` (`id_diplome`, `libelle`, `specialite`) VALUES
(6001, 'Licence Appliquée co_construite', 'conception et réalisation de films d''animation 3D'),
(6002, 'Licence Fondamentale', 'Informatique et mulimédia'),
(6003, 'Licence Fondamentale', 'Consruction Métallique'),
(6004, 'Licence Fondamentale', 'Tronc commun'),
(6005, 'Licence Appliquée', 'Communication multimédia'),
(6006, 'Licence Appliquée', 'direction photo'),
(6007, 'Licence Appliquée', 'son'),
(6008, 'Licence Appliquée', 'écriture et réalisation'),
(6009, 'Licence Appliquée', 'Direction photo'),
(6010, 'Licence Appliquée', 'Montage'),
(6011, 'Licence Appliquée', 'tronc commun'),
(6012, 'Licence Fondamentale', 'prise en charge des personnes agées'),
(6013, 'Licence Fondamentale', 'Gérontologie'),
(6014, 'Licence Fondamentale', 'l''Handicap'),
(6015, 'Licence Fondamentale', 'Réhabilitation sociale'),
(6016, 'Licence Fondamentale', 'Inadaptation sociale'),
(6017, 'Licence Appliquée', 'Education spécialisée'),
(6018, 'Licence Appliquée', 'Francais'),
(6019, 'Licence Appliquée', 'Géomatique'),
(6068, 'Licence Appliquée', 'Architecture d''Intérieur'),
(6069, 'Licence Appliquée', 'Création artisanale'),
(6070, 'Licence Appliquée', 'Scénographie'),
(6071, 'Licence Appliquée', 'Publicité audiovisuelle'),
(6072, 'Licence Appliquée', 'Création industrielle'),
(6073, 'Licence Appliquée', 'Packaging'),
(6074, 'Licence Appliquée', 'Publicité graphique'),
(6075, 'Licence Appliquée', 'Mobilier'),
(6076, 'Licence Appliquée', 'Publicité audiovisuelle'),
(6077, 'Licence Appliquée', 'commerce électronique'),
(6078, 'Licence Appliquée', 'Technologies des systémes d''information'),
(6079, 'Licence Appliquée', 'service électronique '),
(6080, 'Licence Fondamentale', 'Informatique appliquée à la gestion'),
(6081, 'Licence Fondamentale', 'Monnaie-Finance et Banques'),
(6082, 'Licence Fondamentale', 'adm.des affaires'),
(6083, 'Licence Fondamentale', 'Marketing'),
(6084, 'Licence Fondamentale', 'Informatique Appliquée à la Gestion'),
(6085, 'Licence Fondamentale', 'Management'),
(6086, 'Licence Fondamentale', 'finances'),
(6087, 'Licence Fondamentale', 'Economie quantitative'),
(6089, 'Licence Fondamentale', 'Economie et Gestion Quatitatives Ingénierie economique'),
(6090, 'Licence Fondamentale', 'Administration des affaires'),
(6091, 'Licence Appliquée', 'gestion des institutions financiéres'),
(6092, 'Licence Appliquée', 'Commerce Electronique'),
(6093, 'Licence Appliquée', 'gestion hoteliére et touristiques'),
(6094, 'Licence Appliquée', 'vente et négociation commerciale '),
(6095, 'Licence Appliquée', 'Techniques de Commerce International'),
(6096, 'Licence Appliquée', 'Marketing:techniques de vente et distribution'),
(6097, 'Licence Appliquée', 'commerce'),
(6098, 'Licence Appliquée', 'Economie du transport et logistique'),
(6099, 'Licence Appliquée', 'Gestion des Institutions Financières'),
(6100, 'Licence Appliquée', 'Gestion Hôtelière et Touristique'),
(6101, 'Licence Appliquée', 'finances : gestion des entreprises financiéres'),
(6102, 'Licence Appliquée', 'marketing : vente et négociations commerciales'),
(6103, 'Licence Appliquée', 'Finances : banques et institutions financiéres'),
(6104, 'Licence Fondamentale', 'Biologie integrative'),
(6105, 'Licence Fondamentale', 'Biologie intégrative ,animale,végétale et microbienne'),
(6106, 'Licence Appliquée', 'Co_construite: Contrôle et Assuarance Qualité dans le Secteur Pharmaceutique'),
(6107, 'Licence Appliquée', 'Analyses et Qualité'),
(6108, 'Licence Appliquée', 'Biotechnologie Appliquée Au Secteur Pharmaceutique');

-- --------------------------------------------------------



--
-- Structure de la table `mention`
--

CREATE TABLE IF NOT EXISTS `mention` (
  `id_mention` int(15) NOT NULL,
  `libelle_mention` varchar(25) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`id_mention`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mention`
--

INSERT INTO `mention` (`id_mention`, `libelle`, `description`) VALUES
(5001, 'Sciences de la vie', 'Sciences de la vie'),
(5002, 'Sciences de la vie', 'Biologie Analytique et Expérimentale'),
(5003, 'Sciences de la vie', 'Co-construite: Contrôle et Assurance Qualité dans le secteur pharmaceutique'),
(5004, 'Sciences de la vie', 'Biotechnologie'),
(5005, 'Economie et gestion', 'economie'),
(5006, 'Economie et gestion', 'Gestion'),
(5007, 'sciences et technologie', 'Informatique de gestion'),
(5008, 'Economie et gestion', 'finances'),
(5009, 'Economie et gestion', 'administration des affaires'),
(5010, 'Economie et gestion', 'marketing'),
(5011, 'Economie et gestion', 'Economie et Finance internationales'),
(5012, 'Economie et gestion', 'Economie des organisations et des réseaux'),
(5013, 'Arts', 'Design'),
(5014, 'Arts', 'Design Espace'),
(5015, 'Arts', 'Design Produit '),
(5016, 'Arts', 'Design Image'),
(5017, 'sport', 'Entrainement Sportif'),
(5037, 'Sciences humaines', 'Langue, littérature et civilisation arabes'),
(5038, 'Sciences humaines', 'Langue, civilisation et littérature française'),
(5039, 'Sciences humaines', 'Langue, littérature et civilisation espagnoles'),
(5040, 'Sciences humaines', 'Langue, littérature et civilisation italiennes'),
(5041, 'Sciences humaines', 'Langue, littérature et civilisation allemandes'),
(5042, 'Sciences humaines', 'Histoire'),
(5043, 'Sciences humaines', 'Histoire et géographie'),
(5044, 'Sciences humaines', 'Langue, littérature et civilisation anglaises'),
(5045, 'Sciences humaines', 'Education spécialisée'),
(5046, 'Sciences et technologie', 'Conception et réalisation de films d''animation 3D'),
(5047, 'Sciences et technologie', 'Sciences de l’informatique'),
(5048, 'Sciences et technologies', 'Technique du genie mecanique'),
(5049, 'Arts', 'Arts et médiation'),
(5050, 'Arts', 'cinéma et audiovisuel');

-- --------------------------------------------------------




-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `fk_etablissement_universite1` FOREIGN KEY (`universite_iduniversite`) REFERENCES `universite` (`iduniversite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etablissement_lang`
--
ALTER TABLE `etablissement_lang`
  ADD CONSTRAINT `fk_etablissement_lang_etablissement1` FOREIGN KEY (`etablissement_idetablissement`) REFERENCES `etablissement` (`idetablissement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etablissement_lang_lang1` FOREIGN KEY (`lang_idlang`) REFERENCES `lang` (`idlang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `universite_lang`
--
ALTER TABLE `universite_lang`
  ADD CONSTRAINT `fk_universite_lang_lang1` FOREIGN KEY (`lang_idlang`) REFERENCES `lang` (`idlang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_universite_lang_universite1` FOREIGN KEY (`universite_iduniversite`) REFERENCES `universite` (`iduniversite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
