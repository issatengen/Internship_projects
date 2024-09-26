-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Septembre 2024 à 23:23
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `date_added` date DEFAULT NULL,
  `time_added` time NOT NULL,
  `date_accomplished` timestamp NULL DEFAULT NULL,
  `task_description` text,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `date_added`, `time_added`, `date_accomplished`, `task_description`) VALUES
(3, 'Read', '2024-09-26', '17:27:30', '2024-09-26 17:00:35', 'Read some motivational quotes'),
(4, 'OOP', '2024-09-26', '17:29:08', '2024-09-26 17:04:17', 'Write some programs in Java'),
(5, 'Learn marketing', '2024-09-26', '18:43:21', NULL, 'Read some books about marketing'),
(6, 'Laundry', '2024-09-26', '21:31:08', NULL, 'Wash some clothes very early'),
(9, 'Whatch some Python tutorials', '2024-09-26', '21:32:22', NULL, 'learn some ML libraries'),
(10, 'Learn data structures', '2024-09-26', '21:33:29', NULL, 'Learn data structures with C programming language');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
