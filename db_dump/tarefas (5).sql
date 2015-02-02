-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 02/02/2015 às 23h39min
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
-- Estrutura da tabela `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `caminhoArquivo` text NOT NULL,
  `dataPostagem` varchar(10) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_referencia_arquivos_usuarios` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `caminhoArquivo`, `dataPostagem`, `idUsuario`) VALUES
(38, 'Apostila De Php', 'arquivos/1422798289.pdf', '01/02/2015', 12),
(39, 'Dicas Sobre Git E Github', 'arquivos/1422915103.pdf', '01/02/2015', 27),
(40, 'Exemplos Com Node.js', 'arquivos/1422799117.js', '01/02/2015', 27),
(41, 'Layout Hangar', 'arquivos/1422915468.rar', '02/02/2015', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recados`
--

CREATE TABLE IF NOT EXISTS `recados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarioMandouRecado` int(11) NOT NULL,
  `dataRecado` varchar(30) NOT NULL,
  `recado` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `recados`
--

INSERT INTO `recados` (`id`, `idUsuarioMandouRecado`, `dataRecado`, `recado`) VALUES
(3, 15, '05/01/2015', 'We put together some simple tips for designers who are taking a first pass at writing product copy.\r\nWe put together some simple tips for designers who are taking a first pass at writing product copy.\r\n\r\nWe put together some simple tips for designers who are taking a first pass at writing product copy.'),
(4, 15, '05/01/2015', 'Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural\r\nConfigure os campos que serÃ£o exibidos\r\nAdministre suas mensagens (exclua, altere ou libere)\r\nTorne seu mural privado (restrito, apenas mensagens liberadas serÃ£o exibidas)\r\nTotal seguranÃ§a: bloqueie usuÃ¡rios por IP\r\nSistema totalmente seguro e sem popups\r\nAdministraÃ§Ã£o totalmente em portuguÃªs e em constante atualizaÃ§Ã£o\r\nSem limite de mensagens\r\nTotalmente configurÃ¡vel'),
(5, 15, '05/01/2015', 'Estou tentando editar a parte da averbaÃ§Ã£o, mas estÃ¡ me retornando um erro estranho.'),
(6, 12, '05/01/2015', 'Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural\r\nConfigure os campos que serÃ£o exibidos\r\nAdministre suas mensagens (exclua, altere ou libere)'),
(7, 12, '06/01/2015', 'OlÃ¡ recado para Natanael'),
(8, 15, '06/01/2015', 'Estou com problemas para acessar a pÃ¡gina home.'),
(9, 15, '06/01/201508:09:36am', 'Sabem dizer se a pÃ¡gina de averbaÃ§Ã£o jÃ¡ estÃ¡ funcionando?'),
(10, 15, '06/01/201508', 'Estou tentando editar a parte da averbaÃ§Ã£o, mas estÃ¡ me retornando um erro estranho.'),
(12, 15, '06/01/201527', 'Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural\r\nConfigure os campos que serÃ£o exibidos\r\nAdministre suas mensagens (exclua, altere ou libere)'),
(13, 15, '06/01/201508:27', 'Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural\r\nConfigure os campos que serÃ£o exibidos\r\nAdministre suas mensagens (exclua, altere ou libere)'),
(14, 15, '06/01/201508:28:24', 'Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural\r\nConfigure os campos que serÃ£o exibidos\r\nAdministre suas mensagens (exclua, altere ou libere)'),
(18, 27, '06/01/2015', 'Estou tentando editar a parte da averbaÃ§Ã£o, mas estÃ¡ me retornando um erro estranho'),
(19, 28, '06/01/2015', 'Teste de acesso ao Gravatar'),
(20, 12, '07/01/2015', '( Janilson ) Quando se usa PDO a expressÃ£o ( LIKE ) Ã© passada no mÃ©todo ( execute ).\r\nTipo assim:\r\n \r\n$query = db->prepare("select * from {$tableName} like = ?");\r\n$query->execute(array("%$busca%");'),
(21, 12, '07/01/2015', '( Janilson ) Quando se usa PDO a expressÃ£o ( LIKE ) Ã© passada no mÃ©todo ( execute ).\r\nTipo assim:\r\n\r\n<pre>\r\n$query = db->prepare("select * from {$tableName} like = ?");\r\n$query->execute(array("%$busca%");\r\n</pre>'),
(27, 12, '07/01/2015', '<p>Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural Configure os campos que ser&atilde;o exibidos Administre suas mensagens (exclua, altere ou libere)</p>'),
(28, 12, '07/01/2015', '<p><a href="https://github.com/valdiney/passos/blob/master/js/editor_artigo.js">Passos</a></p>'),
(29, 15, '08/01/2015', '<p>Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural Configure os campos que ser&atilde;o exibidos Administre suas mensagens (exclua, altere ou libere)</p>\r\n\r\n<p>Personalize as cores, o tamanho do texto, o tipo de fonte de seu mural Configure os campos que ser&atilde;o exibidos Administre suas mensagens (exclua, altere ou libere)</p>'),
(31, 15, '08/01/2015', '<p><!--?php $consulta = $pdo--->prepare(&quot;select * from livros&quot;); $consulta-&gt;execute(); $linha = $consulta-&gt;fetchAll(PDO::FETCH_OBJ); foreach($linha as $listar) { echo $listar-&gt;titulos; echo $listar-&gt;autor; echo $listar-&gt;descricao; } ?</p>'),
(41, 12, '10/01/2015', '<p><a href="https://github.com/valdiney/Your-task-manager" target="_blank">Exemplo no github&nbsp;</a></p>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `titulo`, `texto`, `vinculoUsuario`, `dataCadastro`, `situacao`, `dataAcao`, `criadorDaTarefa`) VALUES
(8, 'Mas testes pow', 'yuuyuuuyuuyuyu', 12, '22/12/2014', 3, '24/12/2014', 12),
(9, 'Input da pÃ¡gina contratos', '10102020fg2525f5252gththbsghvtheyhyh1', 12, '22/12/2014', 3, '13/01/2015', 12),
(10, 'Help is coming', 'the help is coming as long as you beliave', 12, '24/12/2014', 1, NULL, 12),
(11, 'teste1', 'dfdffdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdfdf', 12, '24/12/2014', 1, NULL, 12),
(12, 'teste2', 'Â¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.\r\nÂ¶ A lei do Senhor Ã© perfeita, e refrigera a alma; o testemunho do Senhor Ã© fiel, e dÃ¡ sabedoria aos sÃ­mplices.\r\n\r\nSalmos 19:1-7\r\nÂ¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.\r\nÂ¶ A lei do Senhor Ã© perfeita, e refrigera a alma; o testemunho do Senhor Ã© fiel, e dÃ¡ sabedoria aos sÃ­mplices.\r\n\r\nSalmos 19:1-7\r\n\r\nÂ¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.\r\nÂ¶ A lei do Senhor Ã© perfeita, e refrigera a alma; o testemunho do Senhor Ã© fiel, e dÃ¡ sabedoria aos sÃ­mplices.\r\n\r\nSalmos 19:1-7Â¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.\r\nÂ¶ A lei do Senhor Ã© perfeita, e refrigera a alma; o testemunho do Senhor Ã© fiel, e dÃ¡ sabedoria aos sÃ­mplices.\r\n\r\nSalmos 19:1-7 \r\n\r\nÂ¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.\r\nÂ¶ A lei do Senhor Ã© perfeita, e refrigera a alma; o testemunho do Senhor Ã© fiel, e dÃ¡ sabedoria aos sÃ­mplices.\r\n\r\nSalmos 19:1-7Â¶ Os cÃ©us declaram a glÃ³ria de Deus e o firmamento anuncia a obra das suas mÃ£os.\r\nUm dia faz declaraÃ§Ã£o a outro dia, e uma noite mostra sabedoria a outra noite.\r\nNÃ£o hÃ¡ linguagem nem fala onde nÃ£o se ouÃ§a a sua voz.\r\nA sua linha se estende por toda a terra, e as suas palavras atÃ© ao fim do mundo. Neles pÃ´s uma tenda para o sol,\r\nO qual Ã© como um noivo que sai do seu tÃ¡lamo, e se alegra como um herÃ³i, a correr o seu caminho.\r\nA sua saÃ­da Ã© desde uma extremidade dos cÃ©us, e o seu curso atÃ© Ã  outra extremidade, e nada se esconde ao seu calor.', 12, '24/12/2014', 3, '13/01/2015', 12),
(14, 'O que sÃ£o Bugs?', 'Um bug (termo da lÃ­ngua inglesa que significa, neste contexto, "defeito") Ã© um erro no funcionamento comum de um software (ou tambÃ©m de hardware), tambÃ©m chamado de falha na lÃ³gica de um programa, e pode causar comportamentos inesperados, como resultado incorreto ou comportamento indesejado. SÃ£o, geralmente, causados por erros no prÃ³prio cÃ³digo-fonte, mas tambÃ©m podem ser causados por algum framework, interpretador, sistema operacional ou compilador.\r\n\r\nDefeitos podem causar tanto problemas como falhas de seguranÃ§a, principalmente em programas que tem alguma forma de conexÃ£o Ã  Internet, como Ã© o caso de navegadores (browsers) e clientes de e-mail, pois crackers podem se aproveitar dessas brechas para terem acesso a informaÃ§Ãµes e arquivos contidos no computador infectado, e sÃ£o mais comuns em programas em desenvolvimento (exemplo: programas em versÃ£o beta), mas, quando descobertos, estes sÃ£o consertados por sua ou equipe de desenvolvimento.', 12, '31/12/2014', 1, '01/01/2015', 12),
(17, 'Mais testes', 'on well I guess that''s just the motion\r\nI guess that''s just the motion oh-oh\r\nI guess that''s just the motion oh-oh\r\nI guess that''s just the motion oh-oh\r\nI guess that''s just the motion', 12, '01/01/2015', 1, '19/01/2015', 12),
(20, 'Corrigir elementos da pÃ¡gina AverbaÃ§Ã£o', '1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superior "top" estÃ¡ muito prÃ³ximo ao "container" do conteÃºdo.', 12, '01/01/2015', 2, '02/01/2015', 12),
(22, 'fvfvf', 'fvfvfvfvfv', 12, '03/01/2015', 1, NULL, 12),
(23, 'Corrigir elementos da pÃ¡gina AverbaÃ§Ã£o', '1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi [...]', 12, '03/01/2015', 1, NULL, 12),
(25, '10 Produtos De Tecnologia Que Deixaram De Existir ', 'mm,,,,m,mkkjkjkjkkklj', 12, '04/01/2015', 1, NULL, 12),
(26, 'O Que SÃ£o Bugs?', '1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi\r\n1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi', 12, '06/01/2015', 1, NULL, 12),
(27, 'Refatorar Os MÃ©todos Para Acessar A API Do Gravat', '1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi\r\n1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi\r\n\r\n1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi', 12, '07/01/2015', 2, '12/01/2015', 12),
(29, 'Just A Text Of The Post', '1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi \r\n\r\n1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi \r\n\r\n1:Deixar todos os inputÂ´s da pÃ¡gina averbaÃ§Ã£o do mesmo tamanho e retirar o border-radius.\r\n2:As mensagens de sucesso devem ter um verde mais claro e a fonte em branco. \r\n3:O footer na parte superi', 12, '10/01/2015', 3, '21/01/2015', 12),
(30, 'Tratamento De Erro 404 Na PÃ¡gina Cadastrar Recado', 'Implementar  atravÃ©s de validaÃ§Ãµes a pÃ¡gina sobre o erro 404 ao nÃ£o encontrar um id passado via \r\n( GET ) no momento de preparar o recado para ediÃ§Ã£o...', 28, '10/01/2015', 3, '22/01/2015', 12),
(31, 'Corrigir Elementos Da PÃ¡gina AverbaÃ§Ã£o', 'hgjyjyyjyjyjyyhyhhyhjyjyjyjyjyjyjy', 29, '22/01/2015', 1, NULL, 12),
(32, 'Vbvbvbvbvbvb', 'fgtytytytyt', 29, '22/01/2015', 1, NULL, 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `dataCadastro`, `perfil`, `perfil_master_master`) VALUES
(12, 'Usuario Admin', 'valdiney.2@hotmail.com', 'admin', '16/12/2014', 1, 1),
(27, 'Flowck II', 'flowck96@hotmail.com', '33479', '04/01/2015', 1, NULL),
(28, 'Natanael Batista', 'natanaelbatista@live.com', '111111', '06/01/2015', 2, NULL),
(29, 'Rafael Brito', 'rafabrito2000@hotmail.com', '32402709', '07/01/2015', 2, NULL),
(30, 'Rita Fundes Dias', 'rita@gmail.com', '999999', '14/01/2015', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosonline`
--

CREATE TABLE IF NOT EXISTS `usuariosonline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuarioOnline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `usuariosonline`
--

INSERT INTO `usuariosonline` (`id`, `idUsuarioOnline`) VALUES
(1, 12),
(2, 13),
(3, 12),
(4, 12),
(5, 12),
(6, 12),
(7, 15),
(8, 12),
(9, 12),
(10, 12),
(11, 12),
(12, 12),
(13, 12),
(14, 12),
(15, 15);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `FK_referencia_arquivos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`criadorDaTarefa`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `tarefas_ibfk_2` FOREIGN KEY (`vinculoUsuario`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
