<?php 
class UsuariosOnlineModel 
{
	protected $idUsuarioOnline;
	private $tableName = "usuariosonline";
	private $db;

	public function __construct(ConexaoInterface $conexao)
	{
		$this->db = $conexao->connect();
	}

	public function setIdUsuarioOnline($idOnline)
	{
		$this->idUsuarioOnline = $idOnline;
	}
    
	public function cadastrarIdUsuariosOnline()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (idUsuarioOnline) values(?)");
	    $cadastrar->execute(array($this->idUsuarioOnline));
	    return $cadastrar;
	}

	public function selectIdUsuariosOnline()
	{
		$query = $this->db->prepare("select * from {$this->tableName}");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}
}
