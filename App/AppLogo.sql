-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 24 Avril 2015 à 11:45
-- Version du serveur: 5.5.41
-- Version de PHP: 5.5.23-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `AppLogo`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6ba4c74366bb4180be8754b4e0c08968', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:37.0) Gecko/20100101 Firefox/37.0', 1429613907, 'a:9:{s:9:"user_data";s:0:"";s:7:"id_user";s:2:"43";s:9:"name_user";s:5:"Lucas";s:13:"lastname_user";s:5:"LOKAR";s:9:"mail_user";s:21:"lucas.lokar@gmail.com";s:10:"phone_user";s:10:"0629250161";s:17:"description_right";s:5:"admin";s:20:"description_language";s:6:"french";s:15:"activation_user";s:1:"1";}'),
('c176980543ef19106a42a674c229b933', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:37.0) Gecko/20100101 Firefox/37.0', 1429812626, 'a:9:{s:9:"user_data";s:0:"";s:7:"id_user";s:2:"43";s:9:"name_user";s:5:"Lucas";s:13:"lastname_user";s:5:"LOKAR";s:9:"mail_user";s:21:"lucas.lokar@gmail.com";s:10:"phone_user";s:10:"0629250161";s:17:"description_right";s:5:"admin";s:20:"description_language";s:6:"french";s:15:"activation_user";s:1:"1";}');

-- --------------------------------------------------------

--
-- Structure de la table `Language`
--

CREATE TABLE IF NOT EXISTS `Language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `description_language` varchar(50) NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Language`
--

INSERT INTO `Language` (`id_language`, `description_language`) VALUES
(1, 'french'),
(2, 'english');

-- --------------------------------------------------------

--
-- Structure de la table `Right_u`
--

CREATE TABLE IF NOT EXISTS `Right_u` (
  `id_right` int(11) NOT NULL AUTO_INCREMENT,
  `description_right` varchar(25) NOT NULL,
  PRIMARY KEY (`id_right`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Right_u`
--

INSERT INTO `Right_u` (`id_right`, `description_right`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(25) NOT NULL,
  `lastname_user` varchar(25) NOT NULL,
  `mail_user` varchar(50) NOT NULL,
  `password_user` varchar(60) NOT NULL,
  `phone_user` varchar(50) NOT NULL,
  `id_right_user` int(10) NOT NULL,
  `id_language_user` int(11) NOT NULL,
  `activation_user` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `id_right_user` (`id_right_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id_user`, `name_user`, `lastname_user`, `mail_user`, `password_user`, `phone_user`, `id_right_user`, `id_language_user`, `activation_user`) VALUES
(2, 'Jean', 'Jacques', 'jj@gmail.com', 'jj', '0606060606', 1, 1, 1),
(43, 'Lucas', 'LOKAR', 'lucas.lokar@gmail.com', 'admin', '0629250161', 1, 1, 1),
(44, 'Eugène', 'Smith', 'eugene.smith@gmail.com', 'admin', '0689453715', 2, 2, 0),
(45, 'Jean', 'Jean', 'jean.jean@groupelogo.fr', '7gAVHu', '0658945126', 1, 1, 1),
(46, 'Jean-Yves', 'Berrez', 'jyberrez@groupelogo.fr', 'QyR72xS', '0000000000', 1, 2, 0),
(47, 'user1', 'user', 'user@gmail.com', '7Ff6okr', '0000000000', 2, 2, 0),
(48, 'user2', 'user', 'user@gmail.com', 'UfvY2Tm1', '0000000000', 2, 1, 0),
(49, 'user3', 'user', 'user@gmail.com', 'rStRkuds', '0000000000', 2, 2, 0),
(51, 'utilisateur', 'Utilisateur', 'lucas.lokar@gmail.com', 'n38wy3P', '0000000000', 1, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
