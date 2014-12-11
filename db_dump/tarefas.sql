-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 09/12/2014 às 00h58min
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
  `fazer` int(11) DEFAULT NULL,
  `sendoFeita` int(11) DEFAULT NULL,
  `feita` int(11) DEFAULT NULL,
  `dataAcao` varchar(10) DEFAULT NULL,
  `criadorDaTarefa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_criador_da_tarefa` (`criadorDaTarefa`),
  KEY `fk_quem_vai_fazer_a_tarefa` (`vinculoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `titulo`, `texto`, `vinculoUsuario`, `dataCadastro`, `fazer`, `sendoFeita`, `feita`, `dataAcao`, `criadorDaTarefa`) VALUES
(4, 'Diminuir o tamanho da Grid', 'A primeira das prisÃµes mencionadas por eles Ã© a da dependÃªncia de mÃ£o de obra especializada na linguagem, cada vez mais rara. Ela Ã© substituÃ­da em parte por desenvolvedores que criam em Java, capazes de ler e entender o novo cÃ³digo e atÃ© mesmo de adicionar funÃ§Ãµes a ele. A segunda prisÃ£o, por sua vez, Ã© a do uso dos Mainframes, as mÃ¡quinas utilizadas para rodar e gerenciar os dados relativos Ã s aplicaÃ§Ãµes em COBOL.', 10, '08/12/2014', 1, NULL, NULL, NULL, 9),
(5, 'BotÃ£o de desaverbar', 'As migraÃ§Ãµes ainda mantÃªm a lÃ³gica de funcionamento original, evitando que o conhecimento da aplicaÃ§Ã£o seja perdido, e rodam como se estivessem na linguagem antiga. De acordo com Sunahara, nenhuma limitaÃ§Ã£o foi encontrada atÃ© agora na migraÃ§Ã£o, e as aplicaÃ§Ãµes jÃ¡ foram testadas em pelo menos 30 plataformas de nuvem diferentes.\r\n\r\nA mudanÃ§a nÃ£o exige grandes adaptaÃ§Ãµes, jÃ¡ que desenvolvedores em COBOL e em Java podem, de certa forma, entender o cÃ³digo. Fowler ainda lembra que isso abre um leque interessante de possÃ­veis implementaÃ§Ãµes no sistema, graÃ§as Ã  boa variedade de APIs na linguagem mais nova. Fora que, no caso de bancos, facilita a comunicaÃ§Ã£o entre equipes de desenvolvimento interno (COBOL) e de caixas eletrÃ´nicos e smartphones (Java), que â€œsÃ£o duas tribos diferentesâ€, nas palavras de Sunahara.', 11, '08/12/2014', 1, NULL, NULL, NULL, 9),
(6, 'Refazer o menu Principal', 'Hoje consegui um tempinho para voltar a postar no blog e resolvi voltar um com uma sequencia de tutorias basicos sobre MySQL + PHP para iniciantes.\r\n\r\nNessa primeira parte vamos criar um script que ira resgatar as notacias de um banco de dados e fazer mais alguns procedimentos.\r\n\r\nHoje consegui um tempinho para voltar a postar no blog e resolvi voltar um com uma sequencia de tutorias basicos sobre MySQL + PHP para iniciantes.\r\n\r\nNessa primeira parte vamos criar um script que ira resgatar as notacias de um banco de dados e fazer mais alguns procedimentos.\r\n\r\nHoje consegui um tempinho para voltar a postar no blog e resolvi voltar um com uma sequencia de tutorias basicos sobre MySQL + PHP para iniciantes.\r\n\r\nNessa primeira parte vamos criar um script que ira resgatar as notacias de um banco de dados e fazer mais alguns procedimentos.', 10, '08/12/2014', 1, NULL, NULL, NULL, 9),
(7, 'Ajustamento das margens das telas desaverbar e con', 'Mas....Ontem, com o site finalmente pronto, ativei o cache, fusÃ£o de css e js do magento e reindexei tudo e fui testar tudo (pela septuagÃ©sima centÃ©sima quinta vez).\r\nIa tudo ok, atÃ© que clique na imagem do produto para ampliar....Uso o lightbox2 (http://www.magentoco...tbox2-8487.html).\r\nBom quando cliquei na imagem, ao invÃ©s de aparecer aquele efeito que a imagem amplia e escurece o fundo, oque aconteceu foi que o navegador abriu a imagem....no lugar do site ficou somente a imagem (nome-da-imagem.png lÃ¡ no browser).\r\nChequei no log e nÃ£o aparecia nada....\r\nEu tentei:\r\nApagar todo o cache;\r\nReindexar tudo;\r\nreinstalar o lightbox.\r\nNada adiantou....\r\nTentei deletar o lightbox e instalei outros similares, mas o resultado era o mesmo com qualquer mÃ³dulo!!!\r\nBom....depois de tentar muito acabei descobrindo que se desativar a fusÃ£o de arquivos javascript o lightbox funciona normal....', 10, '09/12/2014', 1, NULL, NULL, NULL, 9);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `dataCadastro`, `perfil`) VALUES
(9, 'Gilmario Matos', 'gilmario@gmail.com', 'gilmario33', '12/10/2014', 1),
(10, 'Valdiney FranÃ§a', 'valdiney.2@hotmail.com', '3347', '08/12/2014', 2),
(11, 'Eduardo Fonseca', 'eduardo@hotmail.com', '8887', '08/12/2014', 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_2` FOREIGN KEY (`vinculoUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`criadorDaTarefa`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
