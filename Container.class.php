<?php 
/**
* This class is used for manage instances of the objects that have some dependencies
*/
class Container
{
	public static function getUsuario()
	{
		$usuario = new UsuarioModel(self::getConexao());
		return $usuario;
	}
	public static function getTarefas()
	{
		$tarefas = new TarefasModel(self::getConexao());
		return $tarefas;
	}
	
	public static function getConexao()
	{
		$conexao = new Conexao("localhost","tarefas","root","");
	    return $conexao;
	}

	public static function getSendMail()
	{
		$sendEmail = new SendEmail();
		return $sendEmail;
	}
}