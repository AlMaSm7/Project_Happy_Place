-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';



DROP TABLE IF EXISTS `markers`;
CREATE TABLE `markers` (
  `description` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT '#FFFFFF',
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `icon_UNIQUE` (`icon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `markers` (`description`, `id`, `icon`, `color`, `latitude`, `longitude`) VALUES
(NULL,	1,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	2,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	3,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	4,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	5,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	6,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	7,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	8,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	9,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	10,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	11,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	12,	NULL,	'#FFFFFF',	'45',	'42'),
(NULL,	13,	NULL,	'#FFFFFF',	'48',	'29'),
(NULL,	14,	NULL,	'#FFFFFF',	'100',	'89'),
(NULL,	15,	NULL,	'#FFFFFF',	'100',	'0'),
(NULL,	16,	NULL,	'#FFFFFF',	'120',	'50'),
(NULL,	17,	NULL,	'#FFFFFF',	'120',	'32'),
(NULL,	18,	NULL,	'#FFFFFF',	'20',	'20'),
(NULL,	19,	NULL,	'#FFFFFF',	'50',	'100'),
(NULL,	20,	NULL,	'#FFFFFF',	'72',	'4'),
(NULL,	21,	NULL,	'#FFFFFF',	'47',	'8'),
(NULL,	22,	NULL,	'#FFFFFF',	'120',	'89'),
(NULL,	23,	NULL,	'#FFFFFF',	'120',	'0');

DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `places` (`id`, `name`, `latitude`, `longitude`) VALUES
(1,	'adliswil',	'1.2',	'34'),
(2,	'Genf',	'45',	'42'),
(4,	'urdorf',	'45',	'42'),
(10,	'urdorf2',	'45',	'42'),
(21,	'urdorf2',	'45',	'42'),
(22,	'urdorf2',	'45',	'42'),
(23,	'urdorf2',	'45',	'42'),
(24,	'urdorf2',	'45',	'42'),
(25,	'urdorf2',	'45',	'42'),
(26,	'urdorf2',	'45',	'42'),
(27,	'urdorf2',	'45',	'42'),
(28,	'urdorf2',	'45',	'42'),
(29,	'urdorf2',	'45',	'42'),
(30,	'urdorf2',	'45',	'42'),
(31,	'urdorf2',	'45',	'42'),
(32,	'urdorf2',	'45',	'42'),
(33,	'urdorf2',	'45',	'42'),
(34,	'urdorf2',	'45',	'42'),
(35,	'urdorf2',	'45',	'42'),
(36,	'urdorf2',	'45',	'42'),
(37,	'urdorf2',	'45',	'42'),
(38,	'urdorf2',	'45',	'42'),
(39,	'urdorf2',	'45',	'42'),
(40,	'urdorf2',	'45',	'42'),
(41,	'urdorf2',	'45',	'42'),
(42,	'urdorf',	'48',	'29'),
(43,	'orlando',	'100',	'89'),
(44,	'quer',	'100',	'0'),
(45,	'Genf',	'120',	'50'),
(46,	'Schlieren',	'120',	'32'),
(47,	'Schlieren',	'20',	'20'),
(48,	'Schlieren',	'50',	'100'),
(49,	'Genf',	'72',	'4'),
(50,	'Schlieren',	'47',	'8'),
(51,	'ZÃ¼rich',	'120',	'89'),
(52,	'Schlieren',	'120',	'0');

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Username_2` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Users` (`id`, `Username`, `Password`) VALUES
(1,	'smoale',	'ume'),
(5,	'dog',	'doggydog'),
(7,	'alex_m_s',	'kys'),
(9,	'babyonbaby',	'b'),
(11,	'test',	'bruv'),
(12,	'Admin',	'12345'),
(14,	'',	'');
DROP TABLE IF EXISTS `apprentices`;
CREATE TABLE `apprentices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `place_id` int(10) unsigned NOT NULL,
  `markers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`place_id`,`markers_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_apprentices_place_idx` (`place_id`),
  KEY `fk_apprentices_markers1_idx` (`markers_id`),
  CONSTRAINT `fk_apprentices_markers1` FOREIGN KEY (`markers_id`) REFERENCES `markers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_apprentices_place` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `apprentices` (`id`, `prename`, `lastname`, `place_id`, `markers_id`) VALUES
(22,	'hallo',	'muster',	36,	7),
(23,	'hallo',	'muster',	37,	8),
(24,	'hallo',	'muster',	38,	9),
(25,	'hallo',	'muster',	39,	10),
(26,	'hallo',	'muster',	40,	11),
(27,	'hallo',	'muster',	41,	12),
(28,	'hallo',	'muster',	42,	13),
(29,	'alex',	'moin',	43,	14),
(30,	'k',	's',	44,	15),
(31,	'tobi',	'bertschi',	45,	16),
(32,	'hallo',	'muster',	46,	17),
(151,	'severin',	'Machaz',	47,	18),
(152,	'hallo',	'huber',	48,	19),
(153,	'alex',	'muster',	49,	20),
(154,	'yves',	'pls',	50,	21),
(155,	'alex',	'smolders',	51,	22),
(156,	'bruh',	's',	52,	23);

-- 2021-01-12 07:46:57
