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

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
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
}