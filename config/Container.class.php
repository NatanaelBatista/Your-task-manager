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

	public static function getTarefasRelatorios()
	{
		$tarefasRelatorios = new TarefasRelatorios(self::getTarefas());
		return $tarefasRelatorios;
	}

	/**
	* Mantém a conexão com a base de dados.
	* @return instancia do objeto PDO
	*/
	public static function getConexao()
	{
		$servidor = "false";
		if ($servidor == "true")
		{
			$conexao = new Conexao("mysql.mysql12.000webhost.com","a1759951_tarefas","a1759951_base","32402709ney");
		}
		else
		{
			$conexao = new Conexao("localhost","tarefas","root","");
		}
		
	    return $conexao;
	}
}