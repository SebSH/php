-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `username` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`id`),
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `username`) VALUES
(1,	'titre',	'abcd',	1),
(2,	'salut',	'bonjour',	6);

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `body` text NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`id`),
  CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `body`, `article`) VALUES
(1,	1,	'Alphabet',	1),
(2,	6,	'Salutations',	2);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1,	'Moi',	NULL,	NULL),
(2,	'IPSSI',	NULL,	NULL),
(6,	'Seb',	'admin@admin.fr',	NULL);

-- 2019-01-30 15:37:37