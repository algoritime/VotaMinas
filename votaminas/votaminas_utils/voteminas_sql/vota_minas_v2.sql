-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2014 at 10:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vota_minas`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` int(5) NOT NULL,
  `entourage` varchar(10) NOT NULL,
  `propose` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `number`, `entourage`, `propose`, `type`, `image_url`, `created`, `modified`) VALUES
(1, 'Lula', 13, 'PT', 'Vou ser honesto', 'Presidente', 'upload\\192957pablo_author.jpg', '2014-11-16 19:29:57', '2014-11-16 19:29:57'),
(2, 'Dilma', 14, 'PT', 'Vou ser honesta', 'Presidente', 'upload\\IMG_7691.JPG', '2014-11-16 19:44:26', '2014-11-16 19:44:26'),
(3, 'Pablo', 6666, 'PTH', 'Vou roubar mesmo', 'Presidente', 'upload\\195947IMG_7691.JPG', '2014-11-16 19:59:47', '2014-11-16 19:59:47'),
(5, 'Joe', 999, 'PTB', 'Sou santo', 'Governador', 'upload\\Informacoes ENADE.2014.jpg', '2014-11-16 21:34:15', '2014-11-16 21:34:15'),
(11, 'Maurinho', 85698, 'PTB', 'Vou ser legal', 'Senador', 'upload\\122158dilma-rousseff-dedo-meio.jpg', '2014-11-17 12:21:58', '2014-11-17 12:21:58'),
(12, 'Tiririca', 69696, 'PP', 'Vou contar piadas', 'Deputado Federal', 'upload\\122237dilma-rousseff-dedo-meio.jpg', '2014-11-17 12:22:38', '2014-11-17 12:22:38'),
(13, 'Marco Feliciano', 66666, 'PP', 'Dai hoje que receberÃ¡s...', 'Deputado Estadual', 'upload\\122329dilma-rousseff-dedo-meio.jpg', '2014-11-17 12:23:29', '2014-11-17 12:23:29'),
(14, 'Garotinho', 88, 'PC', 'Muitas balas no rio', 'Governador', 'upload\\122607dilma-rousseff-dedo-meio.jpg', '2014-11-17 12:26:07', '2014-11-17 12:26:07'),
(15, 'Eduardo Jorge', 45, 'PM', 'Vamos fumar', 'Senador', 'upload\\231617dilma-rousseff-dedo-meio.jpg', '2014-11-17 23:16:17', '2014-11-17 23:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `pools`
--

CREATE TABLE IF NOT EXISTS `pools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pools`
--

INSERT INTO `pools` (`id`, `name`, `question`, `created`, `modified`) VALUES
(6, 'Presidente', 'Quem vocÃª quer para presidente?', '2014-11-17 11:57:36', '2014-11-17 11:57:36'),
(7, 'Governador', 'Quem vocÃª quer para governador?', '2014-11-17 11:57:58', '2014-11-17 11:57:58'),
(8, 'Senador', 'Quem vocÃª quer para Senador?', '2014-11-17 11:58:10', '2014-11-17 11:58:10'),
(9, 'Deputado Federal', 'Quem vocÃª quer para Deputado Federal?', '2014-11-17 11:58:33', '2014-11-17 11:58:33'),
(10, 'Deputado Estadual', 'Quem vocÃª quer para Deputado Estadual?', '2014-11-17 11:58:45', '2014-11-17 11:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `pools_options`
--

CREATE TABLE IF NOT EXISTS `pools_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pool_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `votes_qt` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidate_id` (`candidate_id`),
  KEY `FK_pools_votes` (`pool_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pools_options`
--

INSERT INTO `pools_options` (`id`, `pool_id`, `candidate_id`, `votes_qt`, `created`, `modified`) VALUES
(1, 6, 1, 0, '2014-11-17 11:59:24', '2014-11-17 11:59:24'),
(2, 6, 2, 0, '2014-11-17 11:59:41', '2014-11-17 11:59:41'),
(3, 6, 3, 0, '2014-11-17 11:59:55', '2014-11-17 11:59:55'),
(5, 8, 11, 0, '2014-11-17 12:24:50', '2014-11-17 12:24:50'),
(6, 9, 12, 0, '2014-11-17 12:25:02', '2014-11-17 12:25:02'),
(7, 10, 13, 0, '2014-11-17 12:25:12', '2014-11-17 12:25:12'),
(8, 7, 14, 0, '2014-11-17 12:26:23', '2014-11-17 12:26:23'),
(9, 7, 5, 0, '2014-11-17 23:23:53', '2014-11-17 23:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(62) NOT NULL,
  `role` enum('admin','regular') NOT NULL DEFAULT 'regular',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `created`, `modified`) VALUES
(8, 'teste1', 'ed55247a91a51b5897523d75a60337d8f653c091', 'teste1', 'teste1@votaminas.com', 'regular', '2014-11-18 03:02:37', '2014-11-18 03:02:37'),
(9, 'teste2', 'a679949fe864263544f2e7ac4d4e1c1c27aea3be', 'teste2', 'teste2@votaminas.com', 'regular', '2014-11-19 11:39:52', '2014-11-19 11:39:52'),
(10, 'teste3', 'eae1554c4d055cebfaafd400635cc787831fa1a9', 'teste3', 'teste3@votaminas.com', 'regular', '2014-11-19 19:14:19', '2014-11-19 19:14:19'),
(11, 'teste4', '85a80a04e46aecf789e9ce7837003a0933f8d930', 'teste4', 'teste4@votaminas.com', 'regular', '2014-11-19 21:15:06', '2014-11-19 21:15:06'),
(12, 'admin', '61c2f07b1d3709525a2ef493c45e166f8cb2ec3b', 'admin', 'admin@votaminas.com', 'admin', '2014-11-19 22:19:41', '2014-11-19 22:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pool_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_votes` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `pool_id`, `created`, `modified`) VALUES
(2, 8, 6, '2014-11-19 12:52:44', '2014-11-19 12:52:44');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pools_options`
--
ALTER TABLE `pools_options`
  ADD CONSTRAINT `FK_candidates_options` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `FK_pools_options` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`id`),
  ADD CONSTRAINT `FK_pools_votes` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `FK_users_votes` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
