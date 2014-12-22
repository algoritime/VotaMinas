-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2014 at 09:58 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vota_minas`
--

CREATE DATABASE IF NOT EXISTS `vota_minas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vota_minas`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `number`, `entourage`, `propose`, `type`, `image_url`, `created`, `modified`) VALUES
(1, 'Dilma', 13, 'PT', 'Propostas', 'Presidente', 'upload\\dilma.jpg', '2014-11-23 12:33:02', '2014-11-23 13:08:47'),
(2, 'AÃ©cio Neves', 45, 'PSDB', 'Propostas', 'Presidente', 'upload\\aecio-neves.jpg', '2014-11-23 12:41:38', '2014-11-23 13:08:53'),
(3, 'Marina Silva', 40, 'PSB', 'Propostas', 'Presidente', 'upload\\marina-silva-40-2.jpg', '2014-11-23 12:42:39', '2014-11-23 13:08:59'),
(7, 'Fernando Pimentel 13', 130, 'PT', 'Propostas', 'Governador', 'upload\\fernando-pimentel.jpg', '2014-11-23 13:02:51', '2014-11-23 13:09:04'),
(8, 'Pimenta da Veiga', 450, 'PSDB', 'Propostas', 'Governador', 'upload\\pimenta-da-veiga.jpg', '2014-11-23 13:03:37', '2014-11-23 13:09:11'),
(10, 'Tarcisio Delgado', 401, 'PSB', 'Propostas', 'Governador', 'upload\\tarcisio-delgado.jpg', '2014-11-23 13:04:10', '2014-11-23 13:09:17'),
(13, 'Antonio Anastasia', 456, 'PSDB', 'Propostas', 'Senador', 'upload\\antonio-anastasia.jpg', '2014-11-23 13:07:01', '2014-11-23 13:09:23'),
(14, 'JosuÃ© Alencar', 150, 'PMDB', 'Propostas', 'Senador', 'upload\\josue-alencar.jpg', '2014-11-23 13:07:32', '2014-11-23 13:07:32'),
(16, 'Margarida Vieira', 400, 'PSB', 'Propostas', 'Senador', 'upload\\margarida-vieira.jpg', '2014-11-23 13:09:46', '2014-11-23 13:09:46'),
(17, 'Reginaldo Lopes', 1312, 'PT', 'Propostas', 'Deputado Federal', 'upload\\reginaldo-lopes.jpg', '2014-11-23 13:10:19', '2014-11-23 13:10:19'),
(18, 'Rodrigo de Castro', 4550, 'PSDB', 'Propostas', 'Deputado Federal', 'upload\\rodrigo-de-castro.jpg', '2014-11-23 13:10:48', '2014-11-23 13:10:48'),
(19, 'Misael Varella', 2505, 'DEM', 'Propostas', 'Deputado Federal', 'upload\\misael-varella.jpg', '2014-11-23 13:11:13', '2014-11-23 13:11:13'),
(20, 'Paulo Guedes', 13789, 'PT', 'Propostas', 'Deputado Estadual', 'upload\\paulo-guedes.jpg', '2014-11-23 13:11:50', '2014-11-23 13:11:50'),
(21, 'Mario Henrique Caixa', 65000, 'PCdoB', 'Propostas', 'Deputado Estadual', 'upload\\mario-henrique-caixa.jpg', '2014-11-23 13:12:24', '2014-11-23 13:12:24'),
(23, 'Leandro Genaro', 40444, 'PSB', 'Propostas', 'Deputado Estadual', 'upload\\leandro-genaro.jpg', '2014-11-23 13:16:31', '2014-11-23 13:16:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pools`
--

INSERT INTO `pools` (`id`, `name`, `question`, `created`, `modified`) VALUES
(2, 'Presidente', 'Pra quem vai seu voto?', '2014-11-23 12:53:21', '2014-11-23 12:56:21'),
(3, 'Governador', 'Pra quem vai seu voto?', '2014-11-23 13:16:55', '2014-11-23 13:16:55'),
(4, 'Senador', 'Pra quem vai seu voto?', '2014-11-23 13:17:02', '2014-11-23 13:17:02'),
(5, 'Deputado Federal', 'Pra quem vai seu voto?', '2014-11-23 13:17:10', '2014-11-23 13:17:10'),
(6, 'Deputado Estadual', 'Pra quem vai seu voto?', '2014-11-23 13:17:16', '2014-11-23 13:17:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pools_options`
--

INSERT INTO `pools_options` (`id`, `pool_id`, `candidate_id`, `votes_qt`, `created`, `modified`) VALUES
(2, 2, 1, 2, '2014-11-23 20:09:08', '2014-11-23 20:09:08'),
(3, 2, 2, 3, '2014-11-23 20:40:54', '2014-11-23 20:40:54'),
(4, 2, 3, 1, '2014-11-23 20:40:59', '2014-11-23 20:40:59'),
(5, 3, 7, 1, '2014-11-23 20:41:05', '2014-11-23 20:41:05'),
(6, 3, 8, 2, '2014-11-23 20:41:09', '2014-11-23 20:41:09'),
(7, 3, 10, 3, '2014-11-23 20:41:13', '2014-11-23 20:41:13'),
(8, 4, 13, 2, '2014-11-23 20:41:17', '2014-11-23 20:41:17'),
(9, 4, 14, 2, '2014-11-23 20:41:22', '2014-11-23 20:41:22'),
(10, 4, 16, 2, '2014-11-23 20:41:35', '2014-11-23 20:41:35'),
(11, 5, 17, 4, '2014-11-23 20:41:39', '2014-11-23 20:41:39'),
(12, 5, 18, 2, '2014-11-23 20:41:42', '2014-11-23 20:41:42'),
(13, 5, 19, 0, '2014-11-23 20:41:47', '2014-11-23 20:41:47'),
(14, 6, 20, 2, '2014-11-23 20:41:50', '2014-11-23 20:41:50'),
(15, 6, 21, 1, '2014-11-23 20:41:53', '2014-11-23 20:41:53'),
(16, 6, 23, 3, '2014-11-23 20:41:55', '2014-11-23 20:41:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `role`, `created`, `modified`) VALUES
(1, 'admin', '61c2f07b1d3709525a2ef493c45e166f8cb2ec3b', 'admin', 'admin@votaminas.com', 'admin', '2014-11-19 22:19:41', '2014-11-19 22:19:41'),
(3, 'teste1', 'ed55247a91a51b5897523d75a60337d8f653c091', 'teste1', 'teste1@teste1.com', 'regular', '2014-11-23 12:14:08', '2014-11-23 12:57:06'),
(5, 'teste2', 'a679949fe864263544f2e7ac4d4e1c1c27aea3be', 'teste2', 'teste2@teste2.com', 'regular', '2014-11-23 12:28:59', '2014-11-23 12:28:59'),
(6, 'teste3', 'eae1554c4d055cebfaafd400635cc787831fa1a9', 'teste3', 'teste3@teste3.com', 'regular', '2014-11-23 12:29:13', '2014-11-23 12:29:13'),
(7, 'teste4', '85a80a04e46aecf789e9ce7837003a0933f8d930', 'teste4', 'teste4@teste4.com', 'regular', '2014-11-23 12:29:23', '2014-11-23 12:29:23'),
(8, 'teste5', '7b10e7939f0d42ba4e44d2d10643836a4d64af96', 'teste5', 'teste5@teste5.com', 'regular', '2014-11-23 12:29:33', '2014-11-23 12:29:33'),
(9, 'teste6', '524c0817977b431a930e52a6bff0cb6ed37e6939', 'teste6', 'teste6@teste6.com', 'regular', '2014-11-23 12:29:42', '2014-11-23 12:29:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `pool_id`, `created`, `modified`) VALUES
(1, 3, 2, '2014-11-23 20:44:16', '2014-11-23 20:44:16'),
(2, 3, 3, '2014-11-23 20:44:21', '2014-11-23 20:44:21'),
(3, 3, 4, '2014-11-23 20:44:24', '2014-11-23 20:44:24'),
(4, 3, 5, '2014-11-23 20:44:26', '2014-11-23 20:44:26'),
(5, 3, 6, '2014-11-23 20:44:29', '2014-11-23 20:44:29'),
(6, 5, 2, '2014-11-23 20:44:58', '2014-11-23 20:44:58'),
(7, 5, 3, '2014-11-23 20:45:00', '2014-11-23 20:45:00'),
(8, 5, 4, '2014-11-23 20:45:03', '2014-11-23 20:45:03'),
(9, 5, 5, '2014-11-23 20:45:05', '2014-11-23 20:45:05'),
(10, 5, 6, '2014-11-23 20:45:07', '2014-11-23 20:45:07'),
(11, 6, 2, '2014-11-23 20:45:16', '2014-11-23 20:45:16'),
(12, 6, 3, '2014-11-23 20:45:19', '2014-11-23 20:45:19'),
(13, 6, 4, '2014-11-23 20:45:20', '2014-11-23 20:45:20'),
(14, 6, 5, '2014-11-23 20:45:23', '2014-11-23 20:45:23'),
(15, 6, 6, '2014-11-23 20:45:25', '2014-11-23 20:45:25'),
(16, 7, 2, '2014-11-23 20:46:00', '2014-11-23 20:46:00'),
(17, 7, 3, '2014-11-23 20:46:03', '2014-11-23 20:46:03'),
(18, 7, 4, '2014-11-23 20:46:05', '2014-11-23 20:46:05'),
(19, 7, 5, '2014-11-23 20:46:07', '2014-11-23 20:46:07'),
(20, 7, 6, '2014-11-23 20:46:09', '2014-11-23 20:46:09'),
(21, 8, 2, '2014-11-23 20:46:27', '2014-11-23 20:46:27'),
(22, 8, 3, '2014-11-23 20:46:30', '2014-11-23 20:46:30'),
(23, 8, 4, '2014-11-23 20:46:32', '2014-11-23 20:46:32'),
(24, 8, 5, '2014-11-23 20:46:35', '2014-11-23 20:46:35'),
(25, 8, 6, '2014-11-23 20:46:37', '2014-11-23 20:46:37'),
(26, 9, 2, '2014-11-23 20:47:03', '2014-11-23 20:47:03'),
(27, 9, 3, '2014-11-23 20:47:08', '2014-11-23 20:47:08'),
(28, 9, 4, '2014-11-23 20:47:10', '2014-11-23 20:47:10'),
(29, 9, 5, '2014-11-23 20:47:15', '2014-11-23 20:47:15'),
(30, 9, 6, '2014-11-23 20:47:17', '2014-11-23 20:47:17');

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
