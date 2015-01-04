<?php 
/**
* Class responsável por manter a persistência dos dados da tabela Tarefas.
* @var private - $db - Recebe um método da class do tipo conexao.
* @author Valdiney França
*/
class TarefasModel
{
	protected $titulo;
	protected $texto;
	protected $vinculoUsuario;
	protected $dataCadastro;
	protected $situacao;
	protected $dataAcao;
	protected $criadorDaTarefa;
	private $tableName = "tarefas";
	private $db;

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
	}

	/**
    * Métodos para setarem os atributos da class.
    */
    public function setTitulo($titulo)
    {
    	$this->titulo = $titulo;
    } 

    public function setTexto($texto)
    {
    	$this->texto = $texto;
    }

    public function setVinculoUsuario($vinculo)
    {
    	$this->vinculoUsuario = $vinculo;
    }

    public function setDataCadastro($data)
    {
    	$this->dataCadastro = $data;
    }

    public function setSituacao($situacao)
    {
    	$this->situacao = $situacao;
    }

    public function setDataAcao($dataAcao)
    {
        $this->dataAcao = $dataAcao;
    }

    public function setCriadorDaTarefa($criadorDaTarefa)
    {
    	$this->criadorDaTarefa = $criadorDaTarefa;
    }
    
    /**
    * Método lista todos os usuarios cadastrados no sistema.
    * @return Array de Objetos
    */
    public function listar()
    {
    	$query = $this->db->prepare("select * from {$this->tableName} order by id desc, dataCadastro desc");
    	$query->execute();
    	return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
    * Método lista usuários de acordo com os seus parametros
    * @param Int - $campo
    * @param String - $valor
    * @return Array de Objetos
    */
    public function listarTarefasWhere($campo, $valor)
    {
        if ($campo == "id" or $campo == "vinculoUsuario" or $campo == "criadorDaTarefa")
        {
            $campo = (int) $valor;
        }

        $query = $this->db->prepare("select * from {$this->tableName} where {$campo} = ?");
        $query->execute(array($valor));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
    * Método cadastra as tarefas no sistema.
    * @return Boolean
    */
    public function cadastrarTarefa()
    {
        $cadastrar = $this->db->prepare("insert into {$this->tableName} (titulo, texto, vinculoUsuario, dataCadastro, situacao, criadorDaTarefa) values(?,?,?,?,?,?)");
        $cadastrar->execute(array($this->titulo, $this->texto, $this->vinculoUsuario, $this->dataCadastro, $this->situacao, $this->criadorDaTarefa));
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
        $editar = $this->db->prepare("update {$this->tableName} set titulo = ?, texto = ?, vinculoUsuario = ?, situacao = ?, dataAcao = ? where id = ?");
        $editar->execute(array($this->titulo, $this->texto, $this->vinculoUsuario, $this->situacao, $this->dataAcao, $id));
        return $editar;
    }
    
    /**
    * Método faz a edição apenas dos vínculos do usuário com a tabela tarefas.
    * @param Int - $idTarefa
    * @param Int - $vinculoNovoUsuario
    * @return Boolean
    */
    public function editarApenasVinculoUsuario($idTarefa, $vinculoNovoUsuario)
    {
        $id = (int) $idTarefa;
        $editar = $this->db->prepare("update {$this->tableName} set vinculoUsuario = ? where id = ?");
        $editar->execute(array($vinculoNovoUsuario, $idTarefa));
        return $editar;
    }
    
    /**
    * Método faz a edição apenas do criador de uma determinada tarefa.
    * @param Int - $idTarefa
    * @param Int - $novoCriador
    * @return Boolean
    */
    public function editarApenasCriadorDaTarefa($idTarefa, $novoCriador)
    {
        $id = (int) $idTarefa;
        $editar = $this->db->prepare("update {$this->tableName} set criadorDaTarefa = ? where id = ?");
        $editar->execute(array($novoCriador, $idTarefa));
        return $editar;
    }
    
    /**
    * Método deleta um tarefa no sistema.
    * @param Int - $id
    * @return Boolean
    */
    public function deletar($id)
    {
        $id = (int) $id;
        $deletar = $this->db->prepare("delete from {$this->tableName} where id = ?");
        return $deletar->execute(array($id));
    }
}
/* End of file TarefasModel.class.php */
/* Location: models */