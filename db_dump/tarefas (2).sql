-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 16/12/2014 às 16h40min
-- Versão do Servidor: 5.5.15
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `vinculoUsuario` int(11) NOT NULL,
  `dataCadastro` varchar(10) NOT NULL,
  `situacao` int(11) DEFAULT NULL,
  `dataAcao` varchar(10) DEFAULT NULL,
  `criadorDaTarefa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_criador_da_tarefa` (`criadorDaTarefa`),
  KEY `fk_quem_vai_fazer_a_tarefa` (`vinculoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `dataCadastro` varchar(10) NOT NULL,
  `perfil` int(11) NOT NULL,
  `perfil_master_master` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `dataCadastro`, `perfil`, `perfil_master_master`) VALUES
(12, 'Usuario Admin', 'admin@admin.com', 'admin', '16/12/2014', 1, 1),
(13, 'Valdiney FranÃ§a', 'valdiney.2@hotmail.com', '3347', '16/12/2014', 1, NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`criadorDaTarefa`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `tarefas_ibfk_2` FOREIGN KEY (`vinculoUsuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
