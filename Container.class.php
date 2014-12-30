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
	public static function getIdUsuariosOnline()
	{
		$usuariosOnline = new UsuariosOnlineModel(self::getConexao());
		return $usuariosOnline;
	}
	public static function getSendMail()
	{
		$sendEmail = new SendEmail();
		return $sendEmail;
	}
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