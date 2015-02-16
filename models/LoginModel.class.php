<?php 
/**
* Class responsável por verificar a existência de usuários cadastrados 
* no sistema durante o ato de fazer login.
* @author Valdiney França
*/
class LoginModel
{
	private $tableName = "usuarios";
	private $db;

	public function __construct(PDO $conexao)
	{
		$this->db = $conexao;
	}
    
    /**
    * Verifica se existe algum usuario com este login
    * @return Boolean
    * @param String $login
    * @param String $senha
    */
	public function verificaLogin($login, $senha)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ? and senha = ?");
		$query->execute(array($login,$senha));

		if ($query->rowCount())
		{
			return true;
		}

		return false;
	}
    
    /**
    * Retorna os dados do Usuario portador de determinado Login e senha
    * @return Array de objetos
    * @param String $login
    * @param String $senha
    */
	public function retornaDadosLogin($login, $senha)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ? and senha = ?");
		$query->execute(array($login,$senha));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
    
    /**
    * Protege as páginas que devem ser somente acessadas via usuário logado.
    * @param Array - $sessionLogin
    * @param String - $caminhoNaoLogado;
    * @return Void
    */
	public function protegeSession($sessionLogin, $caminhoNaoLogado)
	{
		@session_start();
		if (!isset($sessionLogin))
		{
			header("Location:{$caminhoNaoLogado}");
		}
	}
    
    /**
    * Protege as páginas que devem ser somente acessadas pelos usuarios perfil Master e super master.
    * @param Array - $sessionLogin
    * @param String - $caminhoNaoLogado;
    * @return Void
    */
	public function protegeAreaAdminPerfilMaster($sessionLogin, $caminhoNaoLogado)
	{
		@session_start();
		if (isset($sessionLogin) != "1")
		{
			header("Location:{$caminhoNaoLogado}");
		}
	}
    
    /**
    * Método faz o logOut do usuário no sistema.
    * @param String - $paginaDestino
    * @return Void
    */
	public function logOut($paginaDestino)
	{
	   session_destroy();
       header("Location:{$paginaDestino}");
	}

	public function __destruct()
	{
		$fechaConexao = $this->db = null;
	}
}
/* End of file LoginModel.class.php */
/* Location: models */