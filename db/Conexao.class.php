<?php 
require_once("ConexaoInterface.class.php");
/**
* Class para fazer a conexão com a base de dados.
*/
class Conexao implements ConexaoInterface
{
	private $host;
	private $db;
	private $user;
	private $password;
	
	public function __construct($host, $db, $user, $password)
	{
		$this->host = $host;
		$this->db = $db;
		$this->user = $user;
		$this->password = $password;
	}
	public function connect()
	{
		try
		{
			return new \PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->password);
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
}
/* End of file Conexao.class.php */
/* Location: db */