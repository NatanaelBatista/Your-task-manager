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
		$usuario = new UsuarioModel(self::getConexao());
		return $usuario;
	}

    /**
    * Instância a class que trata das persistências da tabela Tarefas.
    * @return instancia do objeto PDO
    */
	public static function getTarefas()
	{
		$tarefas = new TarefasModel(self::getConexao());
		return $tarefas;
	}

	 /**
    * Instância a class que trabalha com os recados cadastrados pelos usuários.
    * @return instancia do objeto PDO
    */
	public static function getRecados()
	{
		$recados = new RecadosModel(self::getConexao());
		return $recados;
	}
    
    /**
    * Instância a class que trabalha com a identificalção de login.
    * @return instancia do objeto PDO
    */
	public static function getLoginModel()
	{
		$login = new LoginModel(self::getConexao());
		return $login;
	}
    
    /**
    * Instância a class para trabalhar com envio de Email.
    * @return instancia do objeto Sendmail
    */
	public static function getSendMail()
	{
		$sendEmail = new SendEmail();
		return $sendEmail;
	}
    
     /**
    * Instância a class para trabalhar com os relatórios de tarefas.
    * @return instancia do objeto Relatorio
    */
	public static function getTarefasRelatorios()
	{
		$tarefasRelatorios = new TarefasRelatorios(self::getTarefas());
		return $tarefasRelatorios;
	}

    /**
    * Instância a class para trabalhar com os relatórios de usuarios.
    * @return instancia do objeto Relatorio
    */
	public static function getUsuariosRelatorios()
	{
		$usuariosRelatorios = new UsuariosRelatorios(self::getUsuario());
		return $usuariosRelatorios; 
	}
    
     /**
    * Instância a class para pesistir os arquivos na tabela.
    * @return instancia do objeto Arquivos
    */
	public static function getArquivos()
	{
		$arquivos = new ArquivoModel(self::getConexao());
		return $arquivos;
	}
    
     /**
    * Instância a class para trabalhar com upload de arquivos.
    * @return instancia do objeto Arquivos
    */
	public static function getTheUploadFiles()
	{
		$upload = new TheUploadFiles();
		return $upload;
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