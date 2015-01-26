<?php 
/**
* Class responsável por manter a persistência dos recados cadastrados pelos usuários.
* @var private - $db - Recebe um método da class do tipo conexao.
* @author Valdiney França
*/
class RecadosModel
{
	protected $idUsuarioMandouRecado;
	protected $dataRecado;
	protected $recado;
	private $tableName = "recados";
	private $db;

	public function __construct(PDO $conexao)
	{
		$this->db = $conexao;
	}

	public function setIdUsuarioMandouRecado($id)
	{
		$this->idUsuarioMandouRecado = $id;
	}

	public function setDataRecado($data)
	{
		$this->dataRecado = $data;
	}

	public function setRecado($recado)
	{
		$this->recado = $recado;
	}

	public function cadastrarRecados()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (idUsuarioMandouRecado, dataRecado, recado) values(?,?,?)");
		$cadastrar->execute(array($this->idUsuarioMandouRecado, $this->dataRecado, $this->recado));
		return $cadastrar; 
	}

	public function listar()
	{
		$query = $this->db->prepare("select * from {$this->tableName} order by id desc, dataRecado asc");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function listarWhere($campo, $valor)
	{
		if ($campo == "id" or $campo == "idUsuarioMandouRecado")
		{
			$valor = (int) $valor;
		}

		$query = $this->db->prepare("select * from {$this->tableName} where {$campo} = ?");
		$query->execute(array($valor));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function listarPagination($inicio, $quantidade)
	{
		$query = $this->db->prepare("select * from {$this->tableName} order by id desc, dataRecado asc limit {$inicio}, {$quantidade}");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function deletar($id)
	{
		$id = (int) $id;
		$deletar = $this->db->prepare("delete from {$this->tableName} where id = ?");
		$deletar->execute(array($id));
		return $deletar;
	}

	public function editar($id)
	{
		$id = (int) $id;
		$editar = $this->db->prepare("update {$this->tableName} set recado = ? where id = ?");
		$editar->execute(array($this->recado,$id));
		return $editar;
	}

	public function __destruct()
	{
		$fechaConexao = $this->db = null;
	}
}
/* End of file RecadosModel.class.php */
/* Location: models */