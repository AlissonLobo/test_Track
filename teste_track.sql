-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2019 às 15:38
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `track`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_track`
--

CREATE TABLE IF NOT EXISTS `teste_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(200) NOT NULL,
  `nome_track` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `genero` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `teste_track`
--

INSERT INTO `teste_track` (`id`, `nome_prod`, `nome_track`, `pais`, `genero`) VALUES
(8, 'Roberval''', 'How How', 'Brasil', 'Deep House'),
(9, 'Kink', 'Follow The Step', 'Inglaterra', 'Techno'),
(10, 'Gabe', 'Tudo Vem', 'Brasil', 'Tech-House'),
(11, 'Vintage Culture', 'Hollywood', 'Brasil', 'Brazilian Bass'),
(12, 'Gui Boratto', 'Azurra', 'Brasil', 'Deep House'),
(13, 'Doctor', 'The Cav', 'Bulgaria', 'Minimal '),
(14, 'ssssssssss', 'sssssssssssssss', 'ssssssssss', 'ssssssssssssssssss'),
(15, 'king of', 'the curtles', 'suÃ©cia', 'deep');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
