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
		return new \PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->password);
	}
}
/* End of file Conexao.class.php */
/* Location: db */