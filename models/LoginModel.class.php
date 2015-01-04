<?php 
/**
* Class responsável por verificar a existência de usuários cadastrados 
* no sistema durante o ato de fazer login.
*/
class LoginModel
{
	private $tableName = "usuarios";
	private $db;

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
	}
    
    /**
    * Verifica se existe algum usuario com este login
    * @return Boolean
    * @param String $login
    * @param String $senha
    */
	public function verificaLogin($login,$senha)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ? and senha = ?");
		$query->execute(array($login,$senha));

		if ($query->rowCount())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
    
    /**
    * Retorna os dados do Usuario portador de determinado Login e senha
    * @return Array de objetos
    * @param String $login
    * @param String $senha
    */
	public function retornaDadosLogin($login,$senha)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ? and senha = ?");
		$query->execute(array($login,$senha));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}