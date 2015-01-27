<?php
require_once("ConexaoInterface.class.php");
/**
* Class para fazer a conexão com a base de dados.
*/
class Conexao implements ConexaoInterface
{
	private static $conexao;
	
	public static function connect()
	{
		if(!isset($conexao))
		{
			try
			{
				$servidor = "true";
				if ($servidor == "true")
				{
					self::$conexao = new PDO("mysql:host=mysql12.000webhost.com;dbname=a1759951_tarefas","a1759951_base","32402709ney");
				}
				else
				{
					self::$conexao = new PDO("mysql:host=localhost;dbname=tarefas","root","");
				}
			}
			catch(PDOException $e)
			{
				if ($e->getCode() == 2002)
				{
					echo "<sql_error>SQL: Esse Localhost não existe</sql_error>";
				}
				elseif ($e->getCode() == 1049)
				{
					echo "<sql_error>SQL: Esse Banco de dados não existe</sql_error>";
				}
				elseif ($e->getCode() == 1044)
				{
					echo "<sql_error>SQL: Usuario inexistente</sql_error>";
				}
				elseif ($e->getCode() == 1045)
				{
					echo "<sql_error>SQL: Essa Senha está incorreta</sql_error>";
				}
			}
		}

		return self::$conexao;
	}
}
/* End of file Conexao.class.php */
/* Location: db */