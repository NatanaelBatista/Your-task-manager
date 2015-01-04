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
    * Instância a class trabalha com a identificalção de login.
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
	* Mantém a conexão com a base de dados.
	* @return instancia do objeto PDO
	*/
	public static function getConexao()
	{
		$servidor = "false";
		if ($servidor == "true")
		{
			$conexao = new Conexao("mysql.hostinger.com.br","u592982482_ney","u592982482_ney","32402709ney");
		}
		else
		{
			$conexao = new Conexao("localhost","tarefas","root","");
		}
		
	    return $conexao;
	}
}