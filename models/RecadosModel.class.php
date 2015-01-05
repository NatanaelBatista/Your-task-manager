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

	public function cadastrarRecados()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (idUsuarioMandouRecado, dataRecado) values(?,?)");
		$cadastrar->execute(array($this->idUsuarioMandouRecado, $this->dataRecado));
		return $cadastrar;
	}
}