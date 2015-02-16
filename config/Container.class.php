<?php 
/**
* Class usada para instanciar objetos que são diretamente dependentes de alguma outra classe.
*/
class Container
{
	/**
    * Instância a class que trata das persistências da tabela Usuario.
    * @return instancia do objeto PDO
    */
	public static function getUsuario()
	{
		return new UsuarioModel(self::getConexao());
	}

    /**
    * Instância a class que trata das persistências da tabela Tarefas.
    * @return instancia do objeto PDO
    */
	public static function getTarefas()
	{
		return new TarefasModel(self::getConexao());
	}

	 /**
    * Instância a class que trabalha com os recados cadastrados pelos usuários.
    * @return instancia do objeto PDO
    */
	public static function getRecados()
	{
		return new RecadosModel(self::getConexao());
	}
    
    /**
    * Instância a class que trabalha com a identificalção de login.
    * @return instancia do objeto PDO
    */
	public static function getLoginModel()
	{
		return new LoginModel(self::getConexao());
	}
    
    /**
    * Instância a class para trabalhar com envio de Email.
    * @return instancia do objeto Sendmail
    */
	public static function getSendMail()
	{
		return new SendEmail();
	}
    
     /**
    * Instância a class para trabalhar com os relatórios de tarefas.
    * @return instancia do objeto Relatorio
    */
	public static function getTarefasRelatorios()
	{
		return new TarefasRelatorios(self::getTarefas());
	}

    /**
    * Instância a class para trabalhar com os relatórios de usuarios.
    * @return instancia do objeto Relatorio
    */
	public static function getUsuariosRelatorios()
	{
		return new UsuariosRelatorios(self::getUsuario());
	}
    
     /**
    * Instância a class para pesistir os arquivos na tabela.
    * @return instancia do objeto Arquivos
    */
	public static function getArquivos()
	{
		return new ArquivoModel(self::getConexao());
	}
    
     /**
    * Instância a class para trabalhar com upload de arquivos.
    * @return instancia do objeto Arquivos
    */
	public static function getTheUploadFiles()
	{
		return new TheUploadFiles();
	}

	/**
	* Mantém a conexão com a base de dados.
	* @return instancia do objeto PDO
	*/
	public static function getConexao()
	{
		return $conexao = Conexao::connect();
	}
}