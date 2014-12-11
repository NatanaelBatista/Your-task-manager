<?php 
class UsuarioModel
{
	protected $nome;
	protected $login;
	protected $senha;
	protected $dataCadastro;
	protected $perfil;
	private $tableName = "usuarios";
	private $db;

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
	}

	/**
    * Set´s: setting the attributes
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
    
	public function retornaDadosLogin($login,$senha)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where login = ? and senha = ?");
		$query->execute(array($login,$senha));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	* Verifica se já existe um determinado Email cadastrado
	* @return boolean
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
    * This method takes all the data from the table
	* @return an array of the objects
	*/
	public function listar()
	{
		$query = $this->db->prepare("select * from {$this->tableName}");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

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

	public function cadastrarUsuario()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (nome, login, senha, dataCadastro, perfil) values(?,?,?,?,?)");
		$cadastrar->execute(array($this->nome, $this->login, $this->senha, $this->dataCadastro, $this->perfil));
		return $cadastrar;
	}

	public function editar($id)
	{
		$id = (int) $id;
		$editar = $this->db->prepare("update {$this->tableName} set nome = ?, login = ?, senha = ?, perfil = ? where id = ?");
		$editar->execute(array($this->nome, $this->login, $this->senha, $this->perfil, $id));
	    return $editar;
	}

	public function deletar($id)
	{
		$id = (int) $id;
		$deletar = $this->db->prepare("delete from {$this->tableName} where id = ?");
		$deletar->execute(array($id));
		return $deletar;
	}
    
    /**
    * Retorna todos os dados entre as tabelas "usuarios e tarefas" via a chave "criadorDaTarefa"
    */
	public function colecaoUsuarioTarefas()
	{
		$query = $this->db->prepare("select usuarios.id as idUsuario, tarefas.id as idTarefas, 
        nome, login, perfil, usuarios.dataCadastro as usuarioDataDoCadastro,
        titulo, texto, tarefas.dataCadastro as tarefasDataDoCadastro,
        fazer, sendoFeita, feita, dataAcao, criadorDaTarefa, vinculoUsuario from usuarios join tarefas on tarefas.criadorDaTarefa = usuarios.id order by tarefas.dataCadastro desc, tarefas.id desc");
		
        $query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}