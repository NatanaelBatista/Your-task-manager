<?php 
/**
* Class responsável por manter a persistência dos dados da tabela Usuários.
*/
class UsuarioModel
{
	protected $nome;
	protected $login;
	protected $senha;
	protected $dataCadastro;
	protected $perfil;
	protected $perfilMasterMaster;
	private $tableName = "usuarios";
	private $db;

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
	}

	/**
    * Métodos para setarem os atributos da class.
    */
    public function setNome($nome)
    {
    	$this->nome = $nome;
    }
    public function setLogin($login)
    {
    	$this->login = $login;
    }
    public function setSenha($senha)
    {
    	$this->senha = $senha;
    }
    public function setDataCadastro($data)
    {
    	$this->dataCadastro = $data;
    }
    public function setPerfil($perfil)
    {
    	$this->perfil = $perfil;
    }
    public function setPerfilMasterMaster($perfilMasterMaster)
    {
    	$this->perfilMasterMaster = $perfilMasterMaster;
    }

	/**
	* Verifica se já existe um determinado Email cadastrado
	* @param String
	* @return Boolean
	*/
	public function verificaEmail($login)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ?");
		$query->execute(array($login));
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
    * Esse método cadastra o primeiro usuário do Sistema 
    * se o mesmo for executado sem nenhum usuário cadastrado.
    * @return Boolean
    */
	public function cadastraOprimeiroUsuario()
	{
		if (count($this->listar()) < 1 and count($this->listar() < 2))
		{
			$cadastrar = $this->db->prepare("insert into {$this->tableName} (nome, login, senha, dataCadastro, perfil, perfil_master_master) values(?,?,?,?,?,?)");
		    $cadastrar->execute(array("Usuario Admin", "admin@admin.com", "admin", Date("d/m/Y"), "1", "1"));
		    return $cadastrar;
		}
	}

    /**
    * Método lista todos os usuarios cadastrados no sistema.
    * @return Array de Objetos
	*/
	public function listar()
	{
		$query = $this->db->prepare("select * from {$this->tableName}");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
    
    /**
    * Método lista usuários de acordo com os seus parametros
    * @param Int - $campo
    * @param String - $valor
    */
	public function listarWhere($campo, $valor)
	{
		if ($campo == "id")
		{
			$valor = (int) $valor;
		}

		$query = $this->db->prepare("select * from {$this->tableName} where {$campo} = ?");
		$query->execute(array($valor));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
    
    /**
    * Método cadastra os usários no sistema.
    * @return Boolean
    */
	public function cadastrarUsuario()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (nome, login, senha, dataCadastro, perfil) values(?,?,?,?,?)");
		$cadastrar->execute(array($this->nome, $this->login, $this->senha, $this->dataCadastro, $this->perfil));
		return $cadastrar;
	}
    
    /**
    * Método faz a edição dos usuários.
    * @param Int - $id
    * @return Boolean
    */
	public function editar($id)
	{
		$id = (int) $id;
		$editar = $this->db->prepare("update {$this->tableName} set nome = ?, login = ?, senha = ?, perfil = ? where id = ?");
		$editar->execute(array($this->nome, $this->login, $this->senha, $this->perfil, $id));
	    return $editar;
	}
    
    /**
    * Método deleta um usuário do sistema.
    * @param Int - $id
    * @return Boolean
    */
	public function deletar($id)
	{
		$id = (int) $id;
		$deletar = $this->db->prepare("delete from {$this->tableName} where id = ?");
		$deletar->execute(array($id));
		return $deletar;
	}
    
    /**
    * Retorna todos os dados entre as tabelas "usuarios e tarefas" via a chave "criadorDaTarefa".
    * @return Array de Objetos
    */
	public function colecaoUsuarioTarefas()
	{
		$query = $this->db->prepare("select usuarios.id as idUsuario, tarefas.id as idTarefas, 
        nome, login, perfil, usuarios.dataCadastro as usuarioDataDoCadastro,
        titulo, texto, tarefas.dataCadastro as tarefasDataDoCadastro,
        situacao, dataAcao, criadorDaTarefa, vinculoUsuario 
        from usuarios join tarefas on tarefas.criadorDaTarefa = 
        usuarios.id order by tarefas.id desc");
		
        $query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
    
    /**
    * Este método é chamado quando necessitamos mostrar uma paginação.
    * @return Array de Objetos
    */
	public function colecaoUsuarioTarefasPagination($inicio, $quantidade)
	{
		$query = $this->db->prepare("select usuarios.id as idUsuario, tarefas.id as idTarefas, 
        nome, login, perfil, usuarios.dataCadastro as usuarioDataDoCadastro,
        titulo, texto, tarefas.dataCadastro as tarefasDataDoCadastro,
        situacao, dataAcao, criadorDaTarefa, vinculoUsuario 
        from usuarios join tarefas on tarefas.criadorDaTarefa = 
        usuarios.id order by tarefas.id desc limit {$inicio}, {$quantidade}");
		
        $query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	/**
    * Método faz a pesquisa das tarefas vinculadas a cada usuario
    * @param String or Int - $campo
    * @param Int or String - $valor
    * @return Array de Objetos
    */
	public function pesquisarColecaoUsuarioTarefas($campo, $valor)
	{
		$query = $this->db->prepare("select usuarios.id as idUsuario, tarefas.id as idTarefas, 
        nome, login, perfil, usuarios.dataCadastro as usuarioDataDoCadastro,
        titulo, texto, tarefas.dataCadastro as tarefasDataDoCadastro,
        situacao, dataAcao, criadorDaTarefa, vinculoUsuario 
        from usuarios join tarefas on tarefas.criadorDaTarefa = 
        usuarios.id where {$campo} like ?");
		
        $query->execute(array("%$valor%"));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
    
    /**
    * Retorna todos os dados entre as tabelas "usuarios e tarefas" via a chave "criadorDaTarefa"
    * de acordo com seus parâmetros.
    * @param String - $campo
    * @param Int or String - $valor
    * @return Array de Objetos
    */
	public function colecaoUsuarioTarefasWhere($campo, $valor)
	{
		if ($campo == "tarefas.id")
		{
			$valor = (int) $valor;
		}

		$query = $this->db->prepare("select usuarios.id as idUsuario, tarefas.id as idTarefas, 
        nome, login, perfil, usuarios.dataCadastro as usuarioDataDoCadastro,
        titulo, texto, tarefas.dataCadastro as tarefasDataDoCadastro,
        situacao, dataAcao, criadorDaTarefa, vinculoUsuario 
        from usuarios join tarefas on tarefas.criadorDaTarefa = 
        usuarios.id where {$campo} = ?");
		
        $query->execute(array($valor));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}
/* End of file UsuarioModel.php */
/* Location: models */